<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use App\Models\Convention;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conventions = Convention::orderBy('id', 'desc')->get();
        return view('backend.conventions.index')->with('conventions', $conventions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('backend.conventions.create')->with('types', $types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'desc' => 'required',
            'image' => 'required'
        ]);
        
        $path = Storage::disk('local')->put('actualites', $request->file('image'));

        $convention = new Convention();
        $convention->type_id = $request->type_id;
        $convention->name = $request->name;
        $convention->city = $request->city;
        $convention->address = $request->address;
        $convention->desc = $request->desc;
        $convention->image = $path;
        $convention->spec = $request->spec;

        $convention->save();

        return redirect()->route('backend.convention');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convention = Convention::find($id);
        $types = Type::all();
        return view('backend.conventions.edit')->with('convention', $convention)->with('types', $types);
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
        $request->validate([
            'type_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'desc' => 'required'
        ]);

        $convention = Convention::find($id);
        if ($request->file('image')) {
            $path = Storage::disk('local')->put('actualites', $request->file('image'));
            $convention->image = $path;
        }

        $convention->type_id = $request->type_id;
        $convention->name = $request->name;
        $convention->city = $request->city;
        $convention->address = $request->address;
        $convention->desc = $request->desc;
        $convention->spec = $request->spec;

        $convention->save();

        return redirect()->route('backend.convention');
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
}
