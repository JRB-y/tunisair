<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email', $request->email)->first();
        
        if (!$user->active) {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
        if (auth()->attempt($credentials)) {

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('home');
                    break;
                case 'employe':
                    return redirect()->route('employe.index');
                    break;
            }

            

        }else {
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
}
