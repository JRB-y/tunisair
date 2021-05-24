<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Vol;
use App\Models\Type;
use App\Models\Banner;
use App\Models\Actualite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $actus = Actualite::where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->where('active' ,'=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $convention_types = Type::all();

        $banners = Banner::all();

        $vols = Vol::all();

        $from = DB::table('vols')
            ->select('escale_depart')
            ->distinct()
            ->pluck('escale_depart');
        $to = DB::table('vols')
            ->select('escale_arrive')
            ->distinct()
            ->pluck('escale_arrive');

        return view('frontend.index')
            ->with('actualites', $actus)
            ->with('convention_types', $convention_types)
            ->with('banners', $banners)
            ->with('flights', $vols)
            ->with('from', $from)
            ->with('to', $to);
    }

    public function show($id)
    {
        // Requete DB id
        $actualite = Actualite::find($id);
        return view('frontend.actualite.show')->with('actualite', $actualite);
    }
}
