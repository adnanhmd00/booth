<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::guard('admin')->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('admin.login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();  
        return redirect()->route('admin.login');
    }
}
