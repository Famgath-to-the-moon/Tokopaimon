<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        // dd(auth()->user());

        if(is_null(auth()->user())){
            return view('auth.login');
        }
        else{
            if (auth()->user()->role_id == 1) {
                return redirect()->route('adminHome');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('userHome');
            }
        }

    }

    public function doLogin(Request $request){
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('adminHome');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('userHome');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
