<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\EMH;

class EMHController extends Controller
{
    public function create(Request $request){

        $doctor = Doctor::where('id_user', $request->id_doctor)->first();

        $emh = EMH::create([

            'id_patient' =>  $request->id_patient,
            'id_doctor' =>   $doctor['id'],
            'create_date' =>  date('d.m.Y'),
            'description' => $request->description,
            'name' => $request->name
        
        ]);
        $emh['doctor'] = $doctor;
        return response()->json([
            "status" => true,
            "post" => $emh
        ]);

    }

    public function ShowOne($id)
    {
        $emh = EMH::where('id', $id)->first();

        if(!$emh || $emh->count() == 0){
            return response()->json([
                "status" => false,
                "message" => "Запись не найдена"
            ], 404);
        }

        return response()->json([
            "status" => true,
            "post" => $emh
        ]);
    }
}
