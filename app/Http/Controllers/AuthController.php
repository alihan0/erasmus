<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Logs;
use Auth;

class AuthController extends Controller
{
    protected $system;

    public function __construct(){
        $this->system = System::first();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request){
        if($this->system->status != 1){
            return response()->json(["type" => "warning", "message" => "Sistem aktif değil!"]);
        }

        if(empty($request->email) || empty($request->password)){
            return response()->json(["type" => "warning", "message" => "Email ve ya sifrenizi girin!"]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(["type" => "warning", "message" => "Geçerli bir e-posta adresi girin!"]);
            
        }

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            
            if ($user->status == 1) {
                return response()->json(["type" => "success", "message" => "Giriş başarılı!", "status" => true]);
            } else {
                Auth::logout();
                return response()->json(["type" => "warning", "message" => "Oturum açma yetkiniz bulunmuyor!"]);
            }
        } else {
            return response()->json(["type" => "warning", "message" => "Email ya da şifre hatalı"]);
        }
    }

    public function logout(){
        Auth::logout();
        session()->regenerate();
        return redirect('/auth/login');
    }
}
