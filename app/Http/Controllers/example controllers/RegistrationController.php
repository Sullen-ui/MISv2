<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ActsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PatientsController;
use App\Models\Doctor;
use App\Models\Doctor_time;
use denis660\Centrifugo\Centrifugo;
use Illuminate\Http\Request;
use DateTime;
use Barryvdh\DomPDF\PDF;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->section || !$request->date){
            return response()->json([
               "status" => false,
               "message" => "Не переданы необходимые параметры"
            ], 400);
        }

        $doctors = Doctor::where('section_id', $request->section)->with('time','acts')->get();
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
            $active = explode(",", $doctor['active_UTC']);
            if(in_array($date["wday"], $active)) {

                foreach ($doctor['time'] as $time){
                    if ($doctor['type_date'] == 0 && $time['des'] == 3 && strtotime($request->date) >= strtotime($time['start_date'])) {
                        $tm = $time;
                    }elseif($doctor['type_date'] == 1 && ($date["wday"] == 2 || $date["wday"] == 4) && $time['des'] == 1 && strtotime($request->date) >= strtotime($time['start_date'])){
                        $tm = $time;
                    }elseif($doctor['type_date'] == 1 && ($date["wday"] == 1 || $date["wday"] == 3 || $date["wday"] == 5) && $time['des'] == 2 && strtotime($request->date) >= strtotime($time['start_date'])){
                        $tm = $time;
                    }elseif(strtotime($request->date) == $time['start_date'] && $time['type'] == 1){
                        $tm = $time;
                        break;
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
                unset($doctor['active_UTC']);
                unset($doctor['type_date']);
                unset($doctor['user_id']);
                if($doctor['acts'] && $doctor['acts']->count() != 0) {
                    foreach ($doctor['acts'] as $act) {
                        if (strtotime($request->date) == strtotime($act['date'])) {
                            $acts[] = $act;
                            unset($doctor['acts']);
                            $doctor['acts'] = $acts;
                        }else{
                            unset($doctor['acts']);
                        }
                    }

                }else{
                    unset($doctor['acts']);
                }

                $doctorsList[] = $doctor;
            }
        }
        return response()->json($doctorsList, 200);
    }

    public function storeEntry(Request $request, Centrifugo $centrifugo){
        $patient = PatientsController::store($request->patient_data);
        $cart = CartsController::store($patient, $request->cart_type, $request->cart_id);
        if($patient && $cart){
            $act = ActsController::store($request->act_data, $patient);
            if($act['status_response'] == "false"){
                return $act;
            }else{
                $centrifugo->publish('registry', ['message_type' => 'act', 'message' => $act]);
                return response()->json([
                    "status" => true,
                    "message" => "Операция выполнена успешно",
                    "patient_id" => $patient['id'],
                    "act_id" => $act['id'],
                    "cart_id" => $cart['id']
                ], 201);
            }
        }
    }

    public function hospitalStore(Request $request)
    {
        $patient = PatientsController::store($request->patient_data);
        if($patient){
            $patient = PatientsController::hospital($patient->id, $request->cart_data['section_id']);
        }else{
            return response()->json([
                "status" => false,
                "message" => "Пациент не госпитализирован"
            ], 400);
        }
        $cart = CartsController::storeHospital($patient, $request->cart_data);

        if($cart['status'] == "error"){
            return response()->json($cart, 400);
        }else {
            return response()->json([
                "status" => true,
                "message" => "Пациент госпитализирован",
                "patient_id" => $patient['id'],
                "cart_id" => $cart['id']
            ]);
        }
    }


}




