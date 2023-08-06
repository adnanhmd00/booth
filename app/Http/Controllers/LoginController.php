<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        $fieldType = filter_var($request->email);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }else{
            return back();
        }
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();  
        return redirect()->route('admin.login');
    }
}
