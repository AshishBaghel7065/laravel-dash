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
            $validatedData = $request->validate([
                'service' => 'required|string|max:255',
                'image' => 'required|string',  // Assuming it's a URL or file path
                'category' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            Service::create($validatedData);
            return redirect()->route('dashboard.service')->with('success', 'Service created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    // Update an existing service
    public function updateService(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'service' => 'required|string|max:255',
                'image' => 'required|string',  // Assuming it's a URL or file path
                'category' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
    
            // Find the service by ID
            $service = Service::find($id);
            if (!$service) {
                return back()->withErrors(['message' => 'Service not found']);
            }
    
            // Update service details
            $service->update($validatedData);
    
            // Redirect with success message
            return redirect()->route('dashboard.service')->with('success', 'Service updated successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
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

    // Show form to edit an existing service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('Createandupdate.updateservice', compact('service'));
    }
}
