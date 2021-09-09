<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if(Auth::guard('admin')->attempt($credential, $request->member))
        {
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('email,remember'))->with('error', 'Invalid Email or password');;
    }

    public function logout()
    {
        
        // if (auth()->user()->role_id == 1) {
            
        //     Auth::logout();
        //     return redirect()->route('login_register')->with('message', 'Successfully logged out.');
        // }

        // else if (auth()->user()->role_id != 1) {
        //     Auth::logout();
        //     dd("!-1");    
        // }

        if(Auth::guard('admin')){
            Auth::guard('admin')->logout();
            // dd('admin');
            return redirect()->route('home');
        }
        // else if(Auth::user()->role_id ==1){
        //     Auth::logout();
        //     return redirect('/');
        // }
        else{
            dd("get out");
        }
    }
}
