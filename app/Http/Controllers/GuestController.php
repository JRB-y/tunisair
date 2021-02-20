<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $actus = Actualite::orderBy('created_at', 'desc')->limit(5)->get();
        return view('welcome')->with('actualites', $actus);
    }
}
