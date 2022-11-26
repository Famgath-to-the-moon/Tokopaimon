<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        // dd(auth()->user());

        if(is_null(auth()->user())){
            return view('auth.login');
        }
        else{
            if (auth()->user()->role_id == 1) {
                return redirect()->route('admin-home');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('home');
            }
        }

    }
    public function register(Request $request){
        // dd(auth()->user());

        if(is_null(auth()->user())){
            return view('auth.register');
        }
        else{
            if (auth()->user()->role_id == 1) {
                return redirect()->route('admin-home');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('home');
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
            $request->session()->regenerate();
            if (auth()->user()->role_id == 1) {
                return redirect()->route('adminHome');
            }
            if (auth()->user()->role_id == 2) {
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
            ->with('error','Email-Address And Password Are Wrong.');
        }
    }
    public function doRegister(Request $request) {
        $rules = array(
            // 'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        );
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator -> fails()) {
            return redirect()->route('register');
        } else {
            $data = new User;
            $data->role_id  =  2;
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->password = bcrypt($request->input('password'));
            $result = $data->save();
            $data->createToken('token');

            if ($result) {
                if (auth()->user()->role_id == 1) {
                    return redirect()->route('adminHome');
                }
                if (auth()->user()->role_id == 2) {
                    return redirect()->route('home');
                };
            } else {
                return redirect()->route('register');
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
    // public function login(Request $request) {
        //     $email = $request->email;
        //     $password = $request->password;
        
        //     // check by usename
        //     $data = User::with('role')->where('email', $email)->first();

    //     if ($data) {
    //         $token = $data->createToken('token');

    //         if (Hash::check($password, $data->password)) {
    //             return redirect('home');
    //         } else {
        //             return redirect('login');
    //         }
    //     } else {
    //         return redirect('login');
    //     }
    // }
    // public function notLogin() {
    //     return response()->json([
    //         'success' => false,
    //         'message' => "Anda Harus Login Dulu"
    //     ], 401);
    // }
    // public function forgot_password(){
    //     try{
    //         $user = User::find(1);

    //         $to_name = $user->name;
    //         $to_email = $user->email;

    //         $new_pass = $this->generateRandomString();

    //         $user->password = bcrypt($new_pass);
    //         $user->update();

    //         $data = array(
    //             "name" => $to_name,
    //             "email" => $to_email,
    //             "body" => "Your new password is",
    //             "password" => $new_pass
    //         );

    //         Mail::send("emails.mail", $data, function($message) use ($to_email) {
    //             $message->subject('Forgot Password BULL Admin Panel');
    //             $message->from('donotreply@gw.co.id', 'BULL Admin Panel');
    //             $message->to($to_email);
    //         });

    //         return redirect()->route('login')->with(['status' => 'Email forgot password is send to ' . $to_email]);
    //     }catch (Exception $e){
    //         return redirect()->route('login')->with(['error' => $e->getMessage()]);
    //     }
    // }

    // public function generateRandomString($length = 6) {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $charactersLength = strlen($characters);
    //     $randomString = '';

    //     for ($i = 0; $i < $length; $i++) {
    //         $randomString .= $characters[rand(0, $charactersLength - 1)];
    //     }

    //     return $randomString;
    // }
}