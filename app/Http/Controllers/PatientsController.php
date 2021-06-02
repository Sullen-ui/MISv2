<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public static function store($data){

        $patient = Patient::where('name',$data['name'])->where('dob',$data['dob'])->first();
        
        if(!$patient || $patient->count() == 0 ){

            return Patient::create([
                'polis_num' => $data['polis_num'],
                'polis_comp' => $data['polis_comp'],
                'polis_type' => $data['polis_type'],
                'pasport_serial' => $data['pasport_serial'],
                'pasport_num' => $data['pasport_num'],
                'pasport_who' => $data['pasport_who'],
                'pasport_date' => $data['pasport_date'],
                'snils' => $data['snils'],
                'name' => $data['name'],
                'work_place' => $data['work_place'],
                'gender' => $data['gender'],
                'dob' => $data['dob'],
                'dob_place' => $data['dob_place'],
                'registration' => $data['registration'],
                'resident' => $data['resident'],
                'phone' => $data['phone'],
                'soc_status' => $data['soc_status'],
                'invalid' => $data['invalid'],
                ]);
                
                
        }else{
            $patient->polis_num = $data['polis_num'];
            $patient->polis_comp = $data['polis_comp'];
            $patient->polis_type = $data['polis_type'];
            $patient->pasport_serial = $data['pasport_serial'];
            $patient->pasport_num = $data['pasport_num'];
            $patient->pasport_who = $data['pasport_who'];
            $patient->pasport_date = $data['pasport_date'];
            $patient->snils = $data['snils'];
            $patient->name = $data['name'];
            $patient->work_place = $data['work_place'];
            $patient->gender = $data['gender'];
            $patient->dob = $data['dob'];
            $patient->dob_place = $data['dob_place'];
            $patient->registration = $data['registration'];
            $patient->resident = $data['resident'];
            $patient->phone = $data['phone'];
            $patient->soc_status = $data['soc_status'];
            $patient->invalid = $data['invalid'];
        }

        return $patient;
      
     
    }

    public static function old($date)
    {
        $unix = (strtotime("now")/60/60) / 8760;
        $date = (strtotime($date)/60/60) / 8760;
        $c = explode(".", $unix - $date);
        $d = str_split($c[0]);
        if( end($d) == 1){
            return $c[0] . " " . "год";
        }elseif(end($d) == 2 || end($d) == 3 || end($d) == 4 ){
            return $c[0] . " " . "года";
        }elseif(end($d) == 0 || end($d) == 5 || end($d) == 6 || end($d) == 7 || end($d) == 8 || end($d) == 9){
            return $c[0] . " " . "лет";
        }
    }

    public function Show($id){

        $patient = Patient::where('id', $id)->first();

        if(!$patient || $patient->count() == 0){

            return response()->json([
                "status" => false,
                "message" => "Пациент не найден"
            ]);

        }

        return response()->json([
            "status" => true,
            "patient" => $patient
        ]);
    }
    public function PatientUpdate($id, Request $request){
       
        $patient = Patient::where('id',$id)->first();

        $patient->polis_num = $request ['polis-num'];
        $patient->polis_comp = $request ['polis-comp'];
        $patient->polis_type = $request ['polis-type'];
        $patient->pasport_serial = $request ['pasport-serial'];
        $patient->pasport_num = $request ['pasport-num'];
        $patient->pasport_who = $request ['pasport-who'];
        $patient->pasport_date = $request ['pasport-date'];
        $patient->snils = $request ['snils'];
        $patient->name = $request ['name'];
        $patient->work_place = $request ['work_place'];
        $patient->gender = $request ['gender'];
        $patient->dob = $request ['dob'];
        $patient->dob_place = $request ['dob_place'];
        $patient->registration = $request ['registration'];
        $patient->resident = $request ['resident'];
        $patient->phone = $request ['phone'];
        $patient->soc_status = $request ['soc_status'];
        $patient->invalid = $request ['invalid'];

        $patient->save();
        return back();
    
    }

    public function search(Request $request)
    {
        if($request->type == "name"){
            $patient = Patient::where('name', 'LIKE', "$request->data%")->limit(5)->get();
        }else if($request->type == "polis"){
            $patient = Patient::where('polis_num', 'LIKE', "$request->data%")->limit(5)->get();
        }

        if(!$patient && $patient->count() == 0){
            return response()->json([
               "status" => false,
            ], 404);
        }

        return response()->json([
            "status" => true,
            "patients" => $patient
        ]);
    }

}
