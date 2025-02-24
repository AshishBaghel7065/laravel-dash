<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class ContactController
{
    // Fetch all contacts for the dashboard
    public function getDashboardContacts()
    {
        $contacts = Contact::all(); // Fetch all contacts from the database
        return view('dashboard.contact', compact('contacts'));
    }
    public function getDashboardContacts2()
    {
        $contacts = Contact::all(); // Fetch all contacts from the database
        return view('dashboard.appointment', compact('contacts'));
    }
    
    

    // Create Contact and redirect to the dashboard
    public function createContact(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'date_of_appointment' => 'required|date',
                'message' => 'required|string',
                'service' => 'nullable|string',
            ]);

            Contact::create($validatedData);
            return redirect('/')->with('success', 'Contact created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return back()->withErrors(['message' => 'Contact not found']);
        }

        $contact->delete();

        return redirect('/dashboard/contact')->with('success', 'Contact deleted successfully');
    }

    public function getById($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json(['error' => 'Contact not found'], 404);
        }

        return response()->json($contact);
    }

}
