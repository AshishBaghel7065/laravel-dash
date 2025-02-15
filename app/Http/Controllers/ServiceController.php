<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class ServiceController 
{
    public function __construct()
    {
        try {
            $services = Service::all();
            View::share('services', $services); // Share Services globally
        } catch (\Throwable $th) {
            View::share('services', []);
        }
    }

    // Get all services and redirect to the dashboard
    public function getDashboardServices()
    {
        $services = Service::all(); // Adjust query as needed
        return redirect()->route('dashboard.service')->with('success', 'Services loaded successfully');
    }

    // Show form to create a new service
    public function createServiceForm()
    {
        return view('Createandupdate.addservice');
    }

    // Create a new service and redirect to the dashboard
    public function createService(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'service' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
                'category' => 'required|string|max:255',
                'description' => 'required|string',
                'active' => 'required|boolean',
            ]);
    
            // Handle Image Upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services', 'public');
                $validatedData['image'] = $imagePath;
            }
    
            // Create the service record
            Service::create($validatedData);
    
            return redirect()->route('dashboard.service')->with('success', 'Service created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function updateService(Request $request, $id)
    {
        // Validate the form data
        $validated = $request->validate([
            'service' => 'string|max:255',
            'category' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'active' => 'boolean',
            'description' => 'string',
        ]);
    
        // Fetch the service to be updated
        $service = Service::findOrFail($id);
    
        // Update the service details
        $service->service = $request->service;
        $service->category = $request->category;
        $service->active = $request->active;
        $service->description = $request->description;
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }
    
        // Save the updated service data
        $service->save();
    
        // Redirect with a success message
        return redirect()->route('dashboard.service', $service->id)->with('success', 'Service updated successfully!');
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    
        // Absolute path redirection
        return redirect('/dashboard/service')->with('success', 'Service deleted successfully.');
    }

    // Get a service by ID
    public function getById($id)
    {
        $service = Service::find($id);
    
        if (!$service) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    
        return response()->json($service);
    }

    public function getByIds($id)
{
    // Fetch the service by ID
    $service = Service::findOrFail($id);
    // Return the view with the service data
    return view('Createandupdate.updateservice', compact('service'));
}
    // Show form to edit an existing service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('Createandupdate.updateservice', compact('service'));
    }
}
