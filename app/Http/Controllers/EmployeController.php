<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $actus = Actualite::orderBy('created_at', 'desc')->limit(5)->get();
        return view('employe')->with('actualites', $actus);
    }
}
