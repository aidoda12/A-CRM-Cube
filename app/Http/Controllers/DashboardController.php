<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Contact;
use App\Models\Report; 
// Ensure Report model exists

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $totalContacts = Contact::count();
        $totalReports = Report::count(); // Added total reports count

        $latestLeads = Lead::latest()->take(5)->get();
        $latestContacts = Contact::latest()->take(5)->get();

        return view('dashboard', compact('totalLeads', 'totalContacts', 'totalReports', 'latestLeads', 'latestContacts'));
    }

    public function globalSearch(Request $request)
{
    $query = $request->input('query');

    // Search Leads
    $leads = Lead::where('name', 'LIKE', "%{$query}%")
                 ->orWhere('email', 'LIKE', "%{$query}%")
                 ->orWhere('phone', 'LIKE', "%{$query}%")
                 ->get();

    // Search Contacts
    $contacts = Contact::where('name', 'LIKE', "%{$query}%")
                       ->orWhere('email', 'LIKE', "%{$query}%")
                       ->orWhere('phone', 'LIKE', "%{$query}%")
                       ->get();

    // Search Reports
    $reports = Report::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('description', 'LIKE', "%{$query}%")
                     ->get();

    return view('search_results', compact('leads', 'contacts', 'reports', 'query'));
}

}
