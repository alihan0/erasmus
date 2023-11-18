<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main.index');
    }

    public function upload(Request $request){
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/uploads');
            $url = asset(str_replace('public', 'storage', $path));

        

            return response()->json(["type" => "success", "message" => "Dosya başarıyla yüklendi", "url" => $url, "status" => true], 200);
            

            
        }
        return response()->json(["type" => "warning", "message" => "Dosya yüklenirken bir hata oluştu."], 500);
    }
}
