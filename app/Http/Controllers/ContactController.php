<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\MailController; // Import the MailController
use Illuminate\Support\Facades\Mail; 



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
    
    public function getDashboardContacts3()
    {
        $contacts = Contact::all(); // Fetch all contacts from the database
        return view('dashboard.index', compact('contacts'));
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

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $date_of_appointment =  $request->date_of_appointment;
            $message = $request->message;

        // Call the sendUserDetailsMail method
        $mailController = new MailController();
        $mailController->sendUserDetails($name , $email , $phone , $message  ,$date_of_appointment); // No parameters passed


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
