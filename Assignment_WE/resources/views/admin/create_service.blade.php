<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service</title>
    <link rel="stylesheet" href="{{ asset('css/create_service.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <h1>Add New Service</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="Name">Service Name:</label>
            <input type="text" name="Name" id="Name" required><br><br>

            <label for="Description">Description:</label>
            <textarea name="Description" id="Description" required></textarea><br><br>

            <label for="TableDescriptionText">Table Description Text:</label>
            <textarea name="TableDescriptionText" id="TableDescriptionText"></textarea><br><br>

            <label for="ScheduleComment">Schedule Comment:</label>
            <textarea name="ScheduleComment" id="ScheduleComment"></textarea><br><br>

            <label for="Image">Image:</label>
            <input type="file" name="Image" id="Image" accept="image/*"><br><br>

            <div id="subservices">
                <h3>Subservices</h3>
                <div class="subservice">
                    <label for="subservice_name">Subservice Name:</label>
                    <input type="text" name="subservices[0][Name]" required><br><br>

                    <label for="subservice_price">Price:</label>
                    <input type="text" name="subservices[0][Price]" required><br><br>

                    <label for="subservice_details">Details:</label>
                    <textarea name="subservices[0][Details]" required></textarea><br><br>
                </div>
            </div>

            <button type="button" onclick="addSubservice()">Add Another Subservice</button><br><br>
            <button type="submit" class="btn btn-primary">Add Service</button>
        </form>
    </div>

    <script>
        let subserviceCount = 1;

        function addSubservice() {
            const subserviceDiv = document.createElement('div');
            subserviceDiv.classList.add('subservice');
            subserviceDiv.innerHTML = `
                <label for="subservice_name">Subservice Name:</label>
                <input type="text" name="subservices[${subserviceCount}][Name]" required><br><br>

                <label for="subservice_price">Price:</label>
                <input type="text" name="subservices[${subserviceCount}][Price]" required><br><br>

                <label for="subservice_details">Details:</label>
                <textarea name="subservices[${subserviceCount}][Details]" required></textarea><br><br>
            `;
            document.getElementById('subservices').appendChild(subserviceDiv);
            subserviceCount++;
        }
    </script>
</body>

</html>