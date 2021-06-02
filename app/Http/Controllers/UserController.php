<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public static function RoleCheck($roleArray){

        $roleArray = explode(',', $roleArray);

        if(in_array(Auth::user()->type, $roleArray )){
            return true;
        }else{
            return false;
            }


    }

    public function delete($id){
        User::where('id', $id)->delete();

        return back();
    }

    public static function name(){
        $doctor = Doctor::where('id_user', Auth::user()->id)->first();
        return ($doctor)?$doctor->name:Auth::user()->login;
    }
}
