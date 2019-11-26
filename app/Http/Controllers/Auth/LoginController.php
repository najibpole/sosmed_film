<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'         => 'required|email|exists:users',
            'password'      => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(\Hash::check($request->password, $user->password)){
            \Auth::login($user, $request->filled('ingat_saya'));
           return redirect()->route('dashboard') ;
        }
        $validator = \Validator::make($request->all(), []);
        $validator->errors()->add('password', 'Password tidak sesuai');
        return redirect()->back()->withInput()->withErrors($validator);
    }
}
