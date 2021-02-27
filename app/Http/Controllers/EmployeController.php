<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Actualite;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $actus = Actualite::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('employe')->with('actualites', $actus);
    }
}
