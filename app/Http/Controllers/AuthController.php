<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        // check by usename
        $data = User::with('role')->where('email', $email)->first();

        if ($data) {
            $token = $data->createToken('token');

            if (Hash::check($password, $data->password)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil Masuk',
                    'data' => $data,
                    'token' => $token->plainTextToken,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'E-mail atau Password salah',
                ], 403);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Username / Email tidak ditemukan"
            ], 403);
        }
    }
    public function register(Request $request) {
        $rules = array(
            // 'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator -> fails()) {
            return response()->json([
                'success' => false,
                'message' => 'gagal membuat pengguna',
            ]);
        } else {
            $data = new User;
            $data->role_id  =  2;
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->password = bcrypt($request->input('password'));
            $result = $data->save();
            $token = $data->createToken('token');

            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil Registrasi Pengguna",
                    'data' => $data,
                    'token' => $token->plainTextToken,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Gagal Registrasi Pengguna"
                ], 403);
            }
        }
    }
    public function notLogin() {
        return response()->json([
            'success' => false,
            'message' => "Anda Harus Login Dulu"
        ], 401);
    }
    public function forgot_password(){
        try{
            $user = User::find(1);

            $to_name = $user->name;
            $to_email = $user->email;

            $new_pass = $this->generateRandomString();

            $user->password = bcrypt($new_pass);
            $user->update();

            $data = array(
                "name" => $to_name,
                "email" => $to_email,
                "body" => "Your new password is",
                "password" => $new_pass
            );

            Mail::send("emails.mail", $data, function($message) use ($to_email) {
                $message->subject('Forgot Password BULL Admin Panel');
                $message->from('donotreply@gw.co.id', 'BULL Admin Panel');
                $message->to($to_email);
            });

            return redirect()->route('login')->with(['status' => 'Email forgot password is send to ' . $to_email]);
        }catch (Exception $e){
            return redirect()->route('login')->with(['error' => $e->getMessage()]);
        }
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}