<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    use AuthenticatesUsers;
   

    protected $redirectTo = '/home';

    public function __construct()
    {
        
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('LoginAdmin');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'You have been logged in Admin');
            return redirect()->route('home');
        }
    }
}
