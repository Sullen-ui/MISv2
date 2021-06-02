<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Doctor;
use App\Models\EMH;
use App\Models\Patient;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Timetable;
use Illuminate\Support\Facades\Auth;



class PagesController extends Controller
{
    public function ShowAuth(){
        return view('auth/login');
    }

    public function BasePatientShow(Request $request){
        if($request->search){
            $patients = Patient::where('name', 'LIKE', "%$request->search%")->orWhere('polis_num', 'LIKE', "$request->search%")->paginate(15);
            $request->flashOnly(['search']);
        }else{
            $patients = Patient::paginate(15);
        }

        return view('basePatients', [
            "patients" => $patients
        ]);

    }
    public function TimetableShow(){

        $branches = Branch::All();

        return view('Timetable',['branches'=> $branches]);
    }

    public function Patient($id){
        $patient = Patient::where('id', $id)->first();
        $patient->old = PatientsController::old($patient->dob);
        $templates = Template::where('id_doctor',DoctorsController::getDoctorID())->get();
        $emhs = EMH::where('id_patient', $id)->with('doctor')->get();

        return view('patient', [
            "patient" => $patient,
            "templates" => $templates,
            "emhs" => $emhs
        ]);
    }


    public function Admin(){
        $branches = Branch::all();
        $doctors = Doctor::all();
        $users = User::all();

        return view('AdminTable', [
            "branches" => $branches,
            "doctors" => $doctors,
            "users" => $users
        ]);
    }


}
