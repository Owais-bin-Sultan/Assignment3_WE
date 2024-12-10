<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
    public function index()
    {
        $subServices = SubService::all();
        return view('admin.subServices.index', compact('subServices'));
    }

    public function create()
    {
        return view('admin.subServices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Price' => 'required|numeric',
            'Details' => 'nullable'
        ]);

        SubService::create($request->only(['Name', 'Price', 'Details']));
        
        return redirect()->route('subServices.index')->with('success', 'SubService created successfully!');
    }

    public function edit($id)
    {
        $subService = SubService::findOrFail($id);
        return view('admin.subServices.edit', compact('subService'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'Price' => 'required|numeric',
            'Details' => 'nullable'
        ]);

        $subService = SubService::findOrFail($id);
        $subService->update($request->only(['Name', 'Price', 'Details']));

        return redirect()->route('subServices.index')->with('success', 'SubService updated successfully!');
    }

    public function destroy($id)
    {
        $subService = SubService::findOrFail($id);
        $subService->delete();

        return redirect()->route('subServices.index')->with('success', 'SubService deleted successfully!');
    }
}
