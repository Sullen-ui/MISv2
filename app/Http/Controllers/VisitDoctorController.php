<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Timetable;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\VisitsController;
use App\Models\Visit_log;
class VisitDoctorController extends Controller
{
       public function index(Request $request)
    {
        if(!$request->section || !$request->date){
            return response()->json([
               "status" => false,
               "message" => "Не переданы необходимые параметры"
            ], 400);
        }
        

        $doctors = Doctor::where('id_branch', $request->section)->with('timetable','visit')->get();
        $doctors = $doctors->sortBy('name');

        if(!$doctors || $doctors->count() == 0){
            return response()->json([
                "status" => false,
                "message" => "Ничего не найдено"
            ], 404);
         
        }
            
        $doctorsList = [];
        $date = getdate(strtotime($request->date));

       
        foreach ($doctors as $doctor){
            $active = explode(",", $doctor['work_day']);
           
            if(in_array($date["wday"], $active)) {

                
            

                foreach ($doctor['timetable'] as $time){
                    if ($time['parity'] == 0 && strtotime($request->date)) {
                        $tm = $time;
                    }elseif(($date["wday"] == 2 || $date["wday"] == 4) && $time['parity'] == 2 ){
                        $tm = $time;
                    }elseif(($date["wday"] == 1 || $date["wday"] == 0 || $date["wday"] == 5) && $time['parity'] == 1){
                        $tm = $time;
                    }
                  
                }

               

                $datimeArray = explode(",", $tm['time']);
                $timeArray = array();
                foreach ($datimeArray as $time){
                    $a = strtotime('00:00');
                    $b = strtotime($time);

                    $secondDifference = ($b - $a);
                    $minuteDiference = ($secondDifference / 60);
                    $timeArray[$minuteDiference] = $time;
                }
                unset($doctor['time']);
                $doctor['time'] = $timeArray;
                unset($doctor['work_days']);
                unset($doctor['id_user']);  
               if($doctor['visit'] && $doctor['visit']->count() != 0) {
                foreach ($doctor['visit'] as $act) {
                    if (strtotime($request->date) == strtotime($act['visit_date'])) {
                        $acts[] = $act;
                        unset($doctor['visit']);
                        $doctor['visit'] = $acts;
                    }else{
                        unset($doctor['visit']);
                    }
                }

            }else{
                unset($doctor['visit']);
            }
            $doctorsList[] = $doctor;
            }

    }

            return response()->json($doctorsList, 200);

}

        // Запись пациента на прием по времени

        public function CreatePatient(Request $request){

            $patient = PatientsController::store($request->patient_data);
            if($patient){
                $visit = VisitsController::store($request->visit , $patient); 
               
                if($visit['status_response'] == false){
                
                    return response()->json($visit, 400);
                
                }else{
                    
                    return response()->json([
                        'status'=>true,
                        'message'=>'Пациент записан',
                        'patient_id' => $patient['id'],
                        'visit_id' => $visit['visit']['id'],
                    ], 201);
               
                }
            }
        }

        public function ShowOne($id){
            $visit = Visit_log::where('id', $id)->with('patient')->first();

            if (!$visit) {
                return response()->json([
                    "status" => false,
                    "message" => "Ничего не найдено"
                ], 404);
            }
            return response()->json($visit);
            
        }

        public function delete($id){
            $visit = Visit_log::where('id', $id)->first();
            
            if (!$visit) {
                return response()->json([
                    "status" => false,
                    "message" => "Ничего не найдено"
                ], 404);
            }

            $visit->delete();

            return response()->json([
                "status" => true,
                "message" => "Запись удалена"
            ]);

        }
}
