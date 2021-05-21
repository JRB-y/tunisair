<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Conjoint;
use App\Models\Situation;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'employe')->get();
        return view('backend.employe.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $situations = Situation::all();
        return view('backend.employe.create')->with('situations', $situations);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required:email',
            'password' => 'required:min:4',
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'employe';
        $user->active = $request->active  === 'on' ? true : false;
        $user->situation_id = $request->situation_id;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->post = $request->post;

        $user->save();

        $conjoint = new Conjoint();
        $conjoint->firstname = $request->spouseFirstname;
        $conjoint->lastname = $request->spouseLastname;
        $conjoint->age = $request->spouseAge;
        $conjoint->gender = $request->spouseGender;
        $conjoint->user_id = $user->id;
        $conjoint->save();

        $childrenCount = count($request->childFirstname);
        for ($i=0; $i < $childrenCount; $i++) {
            if ($request->childFirstname[$i] !== null) {
                $child = new Child();
                $child->firstname = $request->childFirstname[$i];
                $child->lastname = $request->childLastname[$i];
                $child->age = $request->childAge[$i];
                $child->gender = $request->childGender[$i];
                $child->user_id = $user->id;
                $child->save();
            }
        }
        return redirect()->route('backend.employes');
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
        $user = User::with('conjoint')->with('children')->where('id', $id)->first();
        $situations = Situation::all();
        return view('backend.employe.create')->with('user', $user)->with('situations', $situations);
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
        $user = User::find($id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = 'employe';
        $user->active = $request->active  === 'on' ? true : false;
        $user->situation_id = $request->situation_id;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->post = $request->post;
        if ($request->password !== '') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->spouseFirstname && $request->spouseLastname) {
            $conjoint = Conjoint::where('user_id', $user->id)->first();
            if (!$conjoint) {
                $conjoint = new Conjoint();
            }
        
            $conjoint->firstname = $request->spouseFirstname;
            $conjoint->lastname = $request->spouseLastname;
            $conjoint->age = $request->spouseAge;
            $conjoint->gender = $request->spouseGender;
            $conjoint->user_id = $user->id;
            $conjoint->save();
        }

        if (
            count($request->childFirstname) !== 1 &&
            count($request->childLastname) !== 1 &&
            count($request->childAge) !== 1 &&
            count($request->childGender) !== 1
        ) {
            Child::where('user_id', $user->id)->delete();
            $childrenCount = count($request->childFirstname);
            for ($i=0; $i < $childrenCount; $i++) {
                if ($request->childFirstname[$i] !== null) {
                    $child = new Child();
                    $child->firstname = $request->childFirstname[$i];
                    $child->lastname = $request->childLastname[$i];
                    $child->age = $request->childAge[$i];
                    $child->gender = $request->childGender[$i];
                    $child->user_id = $user->id;
                    $child->save();
                }
            }
        }
        return redirect()->route('backend.employes');
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
        $user = User::find($id);
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('backend.employes');
    }
}
