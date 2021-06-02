<?php

namespace App\Http\Controllers;

use App\Models\Visit_log;
use Illuminate\Http\Request;

class VisitsController extends Controller
{
   public static function store($visit_data , $patient_data){

        $visit = Visit_log::where('uid', $visit_data['uid'])->where('visit_date', $visit_data['visit_date'])->first();

        if(!$visit || $visit->count() == 0){
            $visit = Visit_log::create([
                'uid' => $visit_data['uid'],
                'id_branch' => $visit_data['id_branch'],
                'id_doctor' => $visit_data['id_doctor'],
                'visit_date' => $visit_data['visit_date'],
                'id_patient' => $patient_data['id'],
            ]);
            return ['status_response' => true , 'visit' => $visit];

        }else{

            return ['status_response' => false , 'message' => 'Время уже занято'];
        
        }
   }
}
