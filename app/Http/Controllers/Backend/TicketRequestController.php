<?php

namespace App\Http\Controllers\Backend;

use App\Models\TicketRequest;
use App\Http\Controllers\Controller;
use App\Models\Vol;

class TicketRequestController extends Controller
{
    public function index ()
    {
        $requests = TicketRequest::all();
        return view('backend.ticket-requests.index')->with('requests', $requests);
    }

    public function show($requestId)
    {
        $request = TicketRequest::find($requestId);
        return view('backend.ticket-requests.show')->with('request', $requestId);
    }

    public function approve($id)
    {
        $vol = TicketRequest::find($id);
        $vol->status = 'approved';
        $vol->save();
        return redirect()->route('backend.ticket-requests.index');
    }

    public function decline($id)
    {
        $vol = TicketRequest::find($id);
        $vol->status = 'declined';
        $vol->save();
        return redirect()->route('backend.ticket-requests.index');
    }
}
