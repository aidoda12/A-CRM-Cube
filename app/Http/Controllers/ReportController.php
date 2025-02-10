<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // Display the reports page with summary data
    public function index()
    {
        // Fetch total leads and contacts
        $totalLeads = Lead::count();
        $totalContacts = Contact::count();

        // Leads per month (For Bar Chart)
        $leadsPerMonth = Lead::select(DB::raw("MONTH(created_at) as month"), DB::raw("COUNT(*) as count"))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Contact Roles Distribution (For Pie Chart)
        $contactRoles = Contact::select('role', DB::raw('COUNT(*) as count'))
            ->groupBy('role')
            ->pluck('count', 'role');

        return view('reports.index', compact('totalLeads', 'totalContacts', 'leadsPerMonth', 'contactRoles'));
    }
}
