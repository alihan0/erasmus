<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function all(){
        return view('user.all', ['users' => User::where('role', 2)->get()]);
    }

    public function new(){
        return view('user.new');
    }

    public function create(Request $request){
        if(empty($request->name) || empty($request->email) || empty($request->phone) || empty($request->password) || empty($request->company) || empty($request->city) || empty($request->district) || empty($request->country) || empty($request->address)){
            return response()->json(["type" => "warning", "message" => "Tüm alanları doldurun!"]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(["type" => "warning", "message" => "Geçerli bir e-posta adresi girin!"]);
        }

        if(User::where('email', $request->email)->exists()){
            return response()->json(["type" => "warning", "message" => "E-posta kayıtlı!"]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 2;
        $user->status = 1;
        if($user->save()){
            return response()->json(["type" => "success", "message" => "Kullanıcı eklendi","status" => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Kullanıcı eklenemedi"]);
        }
    }
}
