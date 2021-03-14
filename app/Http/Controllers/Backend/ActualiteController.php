<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actus = Actualite::orderBy('id', 'desc')->get();
        return view('backend.actualite.index')->with('actualites', $actus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.actualite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $explodedStart = explode('/', $request->start_date);
        $explodedEnd = explode('/', $request->end_date);

        $path = Storage::disk('local')->put('actualites', $request->file('image'));
        $actu = new Actualite();
        $actu->title = $request->title;
        $actu->content = $request->content;
        $actu->image = $path;
        $actu->user_id = Auth::id();
        $actu->start_date = "$explodedStart[2]-$explodedStart[1]-$explodedStart[0]";
        $actu->end_date = "$explodedEnd[2]-$explodedEnd[1]-$explodedEnd[0]";
        $actu->active = false;
        $actu->save();

        return redirect()->route('backend.actualite');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actu = Actualite::find($id);
        return view('backend.actualite.show')->with('actu', $actu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualite = Actualite::find($id);
        return view('backend.actualite.edit')->with('actualite', $actualite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actu = Actualite::find($id);

        $explodedStart = explode('/', $request->start_date);
        $explodedEnd = explode('/', $request->end_date);

        if ($request->file('image')) {
            $path = Storage::disk('local')->put('actualites', $request->file('image'));
            $actu->image = $path;
        }


        $actu->title = $request->title;
        $actu->content = $request->content;
        $actu->start_date = "$explodedStart[2]-$explodedStart[1]-$explodedStart[0]";
        $actu->end_date = "$explodedEnd[2]-$explodedEnd[1]-$explodedEnd[0]";
        $actu->save();
        return redirect()->route('backend.actualite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function active($id)
    {
        $act = Actualite::find($id);
        $act->active = !$act->active;
        $act->save();

        return redirect()->route('backend.actualite');
    }
}
