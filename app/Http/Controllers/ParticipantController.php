<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContact;
use App\Models\ParticipantType;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Proximity;
use App\Models\Disease;

class ParticipantController extends Controller
{
    public function all(){
        return view('participant.all', ['participants' => User::where('role',3)->get()]);
    }

    public function new(){
        return view('participant.new', ["types" => ParticipantType::all()]);
    }

    public function create(Request $request){
        if(empty($request->type)){
            return response()->json(["type" => "warning", "message" => "Katılımcı türünü seçin!"]);
        }

        if(empty($request->name)){
            return response()->json(["type" => "warning", "message" => "Katılımcı adını girin!"]);
        }

        if(empty($request->email)){
            return response()->json(["type" => "warning", "message" => "Katılımcı e-posta adresini girin!"]);
        }

        if(empty($request->phone)){
            return response()->json(["type" => "warning", "message" => "Katılımcı telefon numarasını girin!"]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(["type" => "warning", "message" => "Gecersiz e-posta adresi!"]);
        }

        if(!is_numeric($request->phone)){
            return response()->json(["type" => "warning", "message" => "Gecersiz telefon numarası!"]);
        }

        if(User::where('email', $request->email)->exists()){
            return response()->json(["type" => "warning", "message" => "Bu e-posta adresi zaten kayıtlı!"]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->blood_group = $request->blood_group;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->address = $request->address;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->role = 3;
        $user->status = 1;
        if($user->save()){
            return response()->json(["type" => "success", "message" => "Katılımcı eklendi","status" => true, 'id' => $user->id]);
        }else{
            return response()->json(["type" => "error", "message" => "Katılımcı eklenemedi"]);
        }
    }
    public function remove(Request $request){
        $user = User::find($request->id);
        if($user->delete()){
            return response()->json(["type" => "success", "message" => "Katılımcı silindi","status" => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Katılımcı silinemedi"]);
        }
    }

    public function edit($id){
        return view('participant.edit', ['participant' => User::find($id), "types" => ParticipantType::all()]);
    }

    public function update(Request $request){
        if(empty($request->type)){
            return response()->json(["type" => "warning", "message" => "Katılımcı türünü seçin!"]);
        }

        if(empty($request->name)){
            return response()->json(["type" => "warning", "message" => "Katılımcı adını girin!"]);
        }

        if(empty($request->email)){
            return response()->json(["type" => "warning", "message" => "Katılımcı e-posta adresini girin!"]);
        }

        if(empty($request->phone)){
            return response()->json(["type" => "warning", "message" => "Katılımcı telefon numarasını girin!"]);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return response()->json(["type" => "warning", "message" => "Gecersiz e-posta adresi!"]);
        }

        if(!is_numeric($request->phone)){
            return response()->json(["type" => "warning", "message" => "Gecersiz telefon numarası!"]);
        }


        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->blood_group = $request->blood_group;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->address = $request->address;
        $user->height = $request->height;
        $user->weight = $request->weight;
        if($user->save()){
            return response()->json(["type" => "success", "message" => "Katılımcı güncellendi","status" => true, 'id' => $user->id]);
        }else{
            return response()->json(["type" => "error", "message" => "Katılımcı güncellendi"]);
        }
    }

    public function detail($id){
        return view('participant.detail', ['user' => User::find($id), 'proximities' => Proximity::all()]);
    }

    public function save_image(Request $request){
        $user = User::find($request->id);
        $user->image = $request->image;
        if($user->save()){
            return response()->json(["type" => "success", "message" => "Fotoğraf kaydedildi","status" => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Fotoğraf kaydedilemedi"]);
        }
    }

    public function add_emergency_contact(Request $request){
        if(!User::find($request->id)){
            return response()->json(["type" => "warning", "message" => "Katılımcı bulunamadı"]);
        }

        if(empty($request->proximity) || empty($request->name) || empty($request->phone)){
            return response()->json(["type" => "warning", "message" => "Bilgileri eksiksiz doldurun"]);
        }

        $contact = new EmergencyContact;
        $contact->user = $request->id;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->proximity = $request->proximity;
        if($contact->save()){
            return response()->json(["type" => "success", "message" => "Acil durum kişisi eklendi", 'status' => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Acil durum kişisi eklenemedi"]);
        }
    }

    public function add_disease(Request $request){
        if(!User::find($request->id)){
            return response()->json(["type" => "warning", "message" => "Katılımcı bulunamadı"]);
        }

        if(empty($request->disease)){
            return response()->json(["type" => "warning", "message" => "Bir hastalık adı girmelisiniz"]);
        }

        if(empty($request->intructions)){
            return response()->json(["type" => "warning", "message" => "Hastalık talimatları girmelisiniz"]);
        }

        if(empty($request->drugs)){
            return response()->json(["type" => "warning", "message" => "Hastalık ilacı girmelisiniz"]);
        }

        $disease = new Disease;
        $disease->user = $request->id;
        $disease->disease = $request->disease;
        $disease->intructions = $request->intructions;
        $disease->drugs = $request->drugs;
        $disease->is_fatal = $request->is_fatal;
        if($disease->save()){
            return response()->json(["type" => "success", "message" => "Hastalık eklendi", 'status' => true]);
        }else{
            return response()->json(["type" => "error", "message" => "Hastalık eklenemedi"]);
        }
    }
}
