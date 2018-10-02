<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Admin;

class AdminRegController extends Controller
{
	public function reg(){
		return view('auth.register');
	}


    public function create(Request $request)
    {

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:Admin,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reg')->withErrors($validator)->withInput();
        }

        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('home');
    }
}
