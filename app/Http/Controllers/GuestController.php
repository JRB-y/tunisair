<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $actus = Actualite::where('start_date', '<=', Carbon::now())
            // ->whereDate('end_date', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('welcome')->with('actualites', $actus);
    }
}
