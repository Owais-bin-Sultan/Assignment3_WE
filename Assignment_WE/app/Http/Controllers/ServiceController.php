<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\SubService;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class ServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::with('subServices')->get();  // Get all services along with their subservices
        return view('admin.dashboard', compact('services'));
    }

    // Show the form for editing the service and its subservices
    public function edit($id)
    {
        $service = Service::with('subServices')->findOrFail($id);
        $subServices = SubService::all();  // Fetch all subservices to show them in the edit form
        return view('admin.edit_service', compact('service', 'subServices'));
    }

    // Update the service and subservices
    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'required|string',
            'TableDescriptionText' => 'nullable|string',
            'ScheduleComment' => 'nullable|string',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subServices' => 'array|nullable',
        ]);

        // Find the service to update
        $service = Service::findOrFail($id);

        // Handle image upload (if any)
        if ($request->hasFile('Image')) {
            // Delete the old image if it exists
            if ($service->Image && file_exists(public_path('images/' . $service->Image))) {
                unlink(public_path('images/' . $service->Image));
            }

            // Upload the new image and get its file name
            $image = $request->file('Image');
            $imageName = $image->getClientOriginalName();

            // Move the image to public/images/
            $image->move(public_path('images'), $imageName);

            $imagePath = 'images/' . $imageName;  // Store the image path relative to public
        } else {
            // If no new image, keep the existing image
            $imagePath = $service->Image;
        }

        // Update the service with the new data
        $service->update([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
            'TableDescriptionText' => $request->input('TableDescriptionText'),
            'ScheduleComment' => $request->input('ScheduleComment'),
            'Image' => $imagePath,  // Update the image path in the database
        ]);

        // Update subservices if provided
        if ($request->has('subServices')) {
            foreach ($request->subServices as $subServiceId => $subServiceData) {
                $subService = SubService::findOrFail($subServiceId);
                $subService->update([
                    'Name' => $subServiceData['Name'],
                    'Price' => $subServiceData['Price'],
                    'Details' => $subServiceData['Details'],
                ]);
            }
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    public function create()
    {
        return view('admin.create_service');
    }

    // Store the new service and its subservices
    public function store(Request $request)
    {
        try {

            $request->validate([
                'Name' => 'required|string|max:255',
                'Description' => 'required|string',
                'TableDescriptionText' => 'nullable|string',
                'ScheduleComment' => 'nullable|string',
                'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'subservices' => 'required|array',
                'subservices.*.Name' => 'required|string|max:255',
                'subservices.*.Price' => 'required|String',
                'subservices.*.Details' => 'required|string',
            ]);

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('Image')) {
                $image = $request->file('Image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            }

            // Create the service
            $service = Service::create([
                'Name' => $request->Name,
                'Description' => $request->Description,
                'TableDescriptionText' => $request->TableDescriptionText,
                'ScheduleComment' => $request->ScheduleComment,
                'Image' => $imagePath,
            ]);

            // Create subservices and link them to the service
            foreach ($request->subservices as $subServiceData) {
                $subService = SubService::create([
                    'Name' => $subServiceData['Name'],
                    'Price' => $subServiceData['Price'],
                    'Details' => $subServiceData['Details'],
                ]);

                // Attach the subservice to the service
                $service->subServices()->attach($subService);
            }

            return redirect()->route('services.index')->with('success', 'Service added successfully.');
        } catch (\Exception $e) {
            alert('Error adding service: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while adding the service.');
        }
    }

    public function destroy($id)
    {
        // Find the service by its ID
        $service = Service::findOrFail($id);

        // Delete all associated subservices first
        $service->subservices()->delete();

        // Now delete the service itself
        $service->delete();

        // Redirect back with a success message
        return redirect()->route('services.index')->with('success', 'Service and its subservices deleted successfully.');
    }
}
