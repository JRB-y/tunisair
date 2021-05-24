<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\TicketRequest;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the backend dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        $empCount = User::where('role', '=', 'employe')->count();
        $pendingRequests = TicketRequest::where('status', 'pending')->count();
        $approvedRequests = TicketRequest::where('status', 'approved')->count();
        $declinedRequests = TicketRequest::where('status', 'declined')->count();

        return view('backend.dashboard')
            ->with('users', $users)
            ->with('empCount', $empCount)
            ->with('pendingRequests', $pendingRequests)
            ->with('declinedRequests', $declinedRequests)
            ->with('approvedRequests', $approvedRequests);
    }
}
