<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Support\Facades\DB;


class BookSessionController extends Controller
{
    public function bookSession()
{
    $services = Service::all();
    $subServices = SubService::all()->keyBy('id');
    $serviceSubServiceMap = DB::table('service_sub_service')
        ->get()
        ->groupBy('ServiceID')
        ->map(function ($group) {
            return $group->pluck('SubServiceID');
        });

    return view('bookSession', compact('services', 'subServices', 'serviceSubServiceMap'));
}
}

