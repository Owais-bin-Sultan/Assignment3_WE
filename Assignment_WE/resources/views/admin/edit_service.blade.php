<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="{{ asset('css/editServices.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <h1>Edit Service: {{ $service->Name }}</h1>
        
        <!-- Form for editing the main service -->
        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="Name">Service Name:</label>
                <input type="text" id="Name" name="Name" value="{{ old('Name', $service->Name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="Description">Description:</label>
                <textarea id="Description" name="Description" required>{{ old('Description', $service->Description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="TableDescriptionText">Table Description Text:</label>
                <textarea id="TableDescriptionText" name="TableDescriptionText">{{ old('TableDescriptionText', $service->TableDescriptionText) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="ScheduleComment">Schedule Comment:</label>
                <textarea id="ScheduleComment" name="ScheduleComment">{{ old('ScheduleComment', $service->ScheduleComment) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="Image">Service Image:</label>
                <input type="file" id="Image" name="Image">
                @if ($service->Image)
                    <div>
                        <img src="{{ asset($service->Image) }}" alt="Service Image" width="200">
                    </div>
                @endif
            </div>

            <!-- Subservices Table -->
            <h3>Subservices</h3>
            <table>
                <thead>
                    <tr>
                        <th>Subservice Name</th>
                        <th>Price</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service->subServices as $subService)
                        <tr>
                            <td>
                                <input type="text" name="subServices[{{ $subService->id }}][Name]" value="{{ $subService->Name }}" required>
                            </td>
                            <td>
                                <input type="text" name="subServices[{{ $subService->id }}][Price]" value="{{ $subService->Price }}" required>
                            </td>
                            <td>
                                <textarea name="subServices[{{ $subService->id }}][Details]" required>{{ $subService->Details }}</textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <button type="submit">Save Changes</button>
        </form>
        
        <!-- Back Button -->
        <a href="{{ route('services.index') }}" class="back-button">Back</a>
    </div>
</body>

</html>
