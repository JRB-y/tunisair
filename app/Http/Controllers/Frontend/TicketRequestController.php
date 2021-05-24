<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Frontend\QuotaControlService;

class TicketRequestController extends Controller
{
    public function index()
    {
        // temporaire attente webservice
        $vols = Vol::all();
        return view('frontend.tickets.index')->with('flights', $vols);
    }

    public function buy($flightId)
    {
        $quotaControl = new QuotaControlService();

        $quota = $quotaControl->control(request()->user(), session()->get('ticketCount'));

        if (!$quota) {
            return redirect()->route('frontend.tickets.index')->with('error', 'Insufficient quota, please contact the administration!');
        }

        DB::table('ticket_request')->insert([
            'user_id' => request()->user()->id,
            'vol_id' => $flightId,
            'quota_user_when_request' => session()->get('ticketCount'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('frontend.tickets.index')->with('message', 'A request was sent to the administration!');
    }

    public function dismiss($flightId)
    {
        DB::table('ticket_request')->where([
            'user_id' => request()->user()->id,
            'vol_id' => $flightId,
        ])->delete();

        return redirect()->route('frontend.tickets.index')->with('message', 'Your request is dismissed!');
    }

}
