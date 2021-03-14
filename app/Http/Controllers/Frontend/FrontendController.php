<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Actualite;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $actus = Actualite::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $convention_types = Type::all();

        return view('frontend.index')
            ->with('actualites', $actus)
            ->with('convention_types', $convention_types);
    }

    public function show($id)
    {
        // Requete DB id
        $actualite = Actualite::find($id);
        return view('frontend.actualite.show')->with('actualite', $actualite);
    }
}
