<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Hash;

class StaffController extends Controller
{
    public function all(){
        return view('staff.all', ['staffs' => User::where('role',1)->get()]);
    }
    public function new(){
        return view('staff.new');
    }

    public function create(Request $request){
        if(empty($request->name) || empty($request->email) || empty($request->phone) || empty($request->password)){
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
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->status = 1;
        if($user->save()){
            return response()->json(["type" => "success", "message" => "Personel eklendi","status" => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Personel eklenemedi"]);
        }
    }
}
