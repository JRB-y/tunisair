<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vol;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function daily()
    {
        $vols = Vol::whereDate('date_vol', Carbon::today())->get();
        return view('frontend.flights.daily')->with('flights', $vols);
    }
}
