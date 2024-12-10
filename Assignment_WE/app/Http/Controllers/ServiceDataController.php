<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceDataController extends Controller
{
    public function index()
    {
        $services = Service::with('subServices')->get(); // Fetch all services with related sub-services
        return view('servicesUser', compact('services'));  // Change 'servicesUser' to 'services'
    }
}
