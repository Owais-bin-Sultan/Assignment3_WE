@extends('app')

@section('title', 'Book Session - Bryant Rothmoore Photography')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/bookSession.css') }}?v={{ time() }}">
@endsection
@section('content')
<section id="dynamic-list-section">
    <h2>Create Your Custom Photography Package</h2>
    <p>Select services, provide details, and specify a date!</p>
    <p>Note that we require a booking to be made a day in advance.</p>

    <!-- Service Selector -->
    <div id="service-selector">
        <label for="main-service">Select Main Service:</label>
        <select id="main-service" onchange="updateSubtypes()">
            <option value="">-- Select a Service --</option>
            @foreach ($services as $service)
            <option value="{{ $service->id }}">{{ $service->Name }}</option>
            @endforeach
        </select>

        <div id="subtype-container">
            <label for="subtype-service">Select Subtype:</label>
            <select id="subtype-service">
                <option value="">-- Select a Subtype --</option>
            </select>
        </div>

        <label for="service-date">Select Date:</label>
        <input type="date" id="service-date" min="{{ now()->addDay()->toDateString() }}" required />

        <button type="button" id="add-service">Add Service</button>
        <button type="button" id="remove-service">Remove Last Item</button>
    </div>

    <!-- Services List -->
    <ul id="services-list"></ul>

    <!-- User Details -->
    <h3>Submit Your Booking</h3>
    <form id="user-details">
        <label for="user-name">Name:</label>
        <input type="text" id="user-name" placeholder="Your Name" required>

        <label for="user-email">Email:</label>
        <input type="email" id="user-email" placeholder="Your Email" required>

        <label for="user-contact">Contact Number:</label>
        <input type="tel" id="user-contact" placeholder="Your Contact Number" required>

        <label for="user-msg">Message:</label>
        <input type="text" id="user-msg" placeholder="Type Your Message" required>
        <button type="submit" id="submit-booking">Submit Booking</button>
    </form>
    <div id="message-container"></div>
</section>
@endsection

@section('scripts')
<script>
    const subServices = @json($subServices);
    const serviceSubServiceMap = @json($serviceSubServiceMap);

    function updateSubtypes() {
        const mainService = document.getElementById('main-service').value;
        const subtypeService = document.getElementById('subtype-service');

        subtypeService.innerHTML = '<option value="">-- Select a Subtype --</option>';

        if (mainService && serviceSubServiceMap[mainService]) {
            serviceSubServiceMap[mainService].forEach(subServiceId => {
                const subService = subServices[subServiceId];
                if (subService) {
                    const option = document.createElement('option');
                    option.value = subService.id;
                    option.textContent = subService.Name;
                    subtypeService.appendChild(option);
                }
            });
            subtypeService.disabled = false;
        } else {
            subtypeService.disabled = true;
        }
    }

    // Add service button functionality
    document.getElementById('add-service').addEventListener('click', function() {
        const mainServiceDropdown = document.getElementById('main-service');
        const subtypeServiceDropdown = document.getElementById('subtype-service');
        const serviceDateInput = document.getElementById('service-date');
        const servicesList = document.getElementById('services-list');

        const mainService = mainServiceDropdown.options[mainServiceDropdown.selectedIndex];
        const subtypeService = subtypeServiceDropdown.options[subtypeServiceDropdown.selectedIndex];
        const serviceDate = serviceDateInput.value;

        if (!mainService.value) {
            alert('Please select a main service.');
            return;
        }

        if (!subtypeService.value) {
            alert('Please select a subtype.');
            return;
        }

        if (!serviceDate) {
            alert('Please select a date.');
            return;
        }

        const listItem = document.createElement('li');
        listItem.textContent = `Main Service: ${mainService.text}, Subtype: ${subtypeService.text}, Date: ${serviceDate}`;
        servicesList.appendChild(listItem);

        mainServiceDropdown.value = '';
        subtypeServiceDropdown.innerHTML = '<option value="">-- Select a Subtype --</option>';
        serviceDateInput.value = '';
    });

    document.getElementById('remove-service').addEventListener('click', function() {
        const servicesList = document.getElementById('services-list');
        if (servicesList.lastChild) {
            servicesList.removeChild(servicesList.lastChild);
        } else {
            alert('No services to remove.');
        }
    });

// Form submission validation
document.getElementById('user-details').addEventListener('submit', function (e) {
    e.preventDefault();

    // Check if at least one service has been added
    const servicesList = document.getElementById('services-list');
    if (servicesList.children.length === 0) {
        const messageContainer = document.getElementById('message-container');
        messageContainer.innerHTML = '<p class="error">Please add at least one service to your booking.</p>';
        return;
    }

    const name = document.getElementById('user-name').value.trim();
    const email = document.getElementById('user-email').value.trim();
    const contact = document.getElementById('user-contact').value.trim();
    const message = document.getElementById('user-msg').value.trim();
    const messageContainer = document.getElementById('message-container');

    // Clear previous messages
    messageContainer.innerHTML = '';

    // Email validation regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // Contact number validation regex (assumes numeric only, 10-15 digits)
    const contactRegex = /^\d{10,15}$/;

    if (!name || !email || !contact || !message) {
        messageContainer.innerHTML = '<p class="error">Please fill out all fields.</p>';
        return;
    }

    if (!emailRegex.test(email)) {
        messageContainer.innerHTML = '<p class="error">Please enter a valid email address.</p>';
        return;
    }

    if (!contactRegex.test(contact)) {
        messageContainer.innerHTML = '<p class="error">Please enter a valid contact number (10-15 digits).</p>';
        return;
    }

    messageContainer.innerHTML = '<p class="success">Thank you! Your booking has been submitted. Our team will be in touch shortly.</p>';

    // Optionally, clear form fields
    this.reset();
});

</script>
@endsection