@extends('app')

@section('title', 'Services - Bryant Rothmoore Photography')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/services.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection

@section('content')
<!-- <img src="{{ asset('images/1.jpg') }}" alt="Service Name"> -->

<!-- Hero Section -->
<section class="hero">
    <h1>Capture Your Moments</h1>
    <p>Professional Photography Services for Every Occasion</p>
    <a href="#section-1" class="cta-button">Explore Our Services</a>
</section>

<!-- Services Gallery -->
<div class="container">
    @foreach ($services as $service)
    <div class="item" style="background-image: url('{{ asset("{$service->Image}") }}')">
        <img src="{{ asset("{$service->Image}") }}" alt="{{ $service->Name }}">
        <div class="content">
            <div class="name">{{ $service->Name }}</div>
            <div class="des">{{ $service->Description }}</div>
            <button>Book Now</button>
            <button onclick="scrollToSection('section-{{ $loop->index + 1 }}')">More</button>
        </div>
    </div>
    @endforeach
</div>

<!-- Services Details -->
<div class="services-info">
    @foreach ($services as $service)
    <section class="section" id="section-{{ $loop->index + 1 }}">
        <h2>{{ $service->Name }}</h2>
        <button class="section-button" id="section-button-{{ $loop->index + 1 }}" onclick="toggle_hidden_details({{ $loop->index + 1 }})">
            Show Details
        </button>
        <div class="section-div" id="section-div-{{ $loop->index + 1 }}" style="display: none;">
            <p>{{ $service->TableDescriptionText }}</p>
            <table>
                <tr>
                    <th>Sub-Service</th>
                    <th>Price</th>
                    <th>Details</th>
                </tr>
                @foreach ($service->subServices as $subService)
                <tr>
                    <td>{{ $subService->Name }}</td>
                    <td>{{$subService->Price}}</td>
                    <td>{{ $subService->Details }}</td>
                </tr>
                @endforeach
            </table>
            <p>
                <strong>Schedule:</strong> {{ $service->ScheduleComment }}
            </p>
        </div>
    </section>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/services.js') }}" defer></script>
<script>
    function toggle_hidden_details(sectionId) {
        const div = document.getElementById(`section-div-${sectionId}`);
        div.style.display = div.style.display === 'none' ? 'block' : 'none';

        const button = document.getElementById(`section-button-${sectionId}`);
        button.textContent = div.style.display === 'block' ? 'Hide Details' : 'Show Details';
    }

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        section.scrollIntoView({ behavior: 'smooth' });
    }
</script>
@endsection
