<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DoctorsController extends Controller
{
    public static function DoctorInfo(){
        $doctor = Doctor::where('id_user', Auth::user()->id)->with('profession')->first();
        if(!$doctor || $doctor->count() == 0){
            return NULL;
        }
        return $doctor['profession']['Name'];

    }

    public static function getDoctorID(){
        $doctor = Doctor::where('id_user', Auth::user()->id)->first();
        if(!$doctor || $doctor->count() == 0){
            return NULL;
        }
        return $doctor['id'];

    }

    public function delete($id){
        Doctor::where('id', $id)->delete();

        return back();
    }
}
