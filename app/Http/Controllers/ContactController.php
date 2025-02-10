<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show all contacts 
    public function index()
    {
        $contacts = Contact::paginate(5); // Display 7 contacts per page
        return view('contacts.index', compact('contacts'));
    }

    // Show create form
    public function create()
    {
        return view('contacts.create');
    }

    // Store new contact
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'nullable',
            'role' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }

    // Show edit form
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Update contact
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable',
            'role' => 'required'
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    // Delete contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

    // Search contacts 
    public function search(Request $request)
    {
        $query = $request->input('query');
        $contacts = Contact::where('name', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%")
                        ->orWhere('role', 'like', "%$query%")
                        ->paginate(7); // Paginate search results

        return view('contacts.index', compact('contacts'));
    }
}
