<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    // Show all leads with pagination (5 per page) and search functionality
    public function index(Request $request)
    {
        $query = $request->input('query'); // Get search query from request

        if ($query) {
            // If a search query is provided, filter leads by name, email, or phone
            $leads = Lead::where('name', 'LIKE', "%$query%")
                ->orWhere('email', 'LIKE', "%$query%")
                ->orWhere('phone', 'LIKE', "%$query%")
                ->paginate(5); // Paginate results (5 per page)
        } else {
            // If no search query, display all leads with pagination
            $leads = Lead::paginate(5);
        }

        return view('leads.index', compact('leads')); // Pass leads to the view
    }

    // Show form to create a new lead
    public function create()
    {
        return view('leads.create');
    }

    // Store a new lead
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:leads',
            'phone' => 'nullable',
        ]);

        Lead::create($request->except('_token'));

        return redirect()->route('leads.index')->with('success', 'Lead added successfully!');
    }

    // Show the edit form
    public function edit(Lead $lead)
    {
        return view('leads.edit', compact('lead'));
    }

    // Update the lead in the database
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'phone' => 'nullable',
        ]);

        $lead->update($request->except('_token'));

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully!');
    }

    // Delete a lead
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully!');
    }
}
