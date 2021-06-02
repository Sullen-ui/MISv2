<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplatesController extends Controller
{
    public function ShowTemplate($id){
        
        $template = Template::where('id',$id)->first();
        if(!$template || $template->count() == 0){
            return response()->json([
                "status" => false,
                "message" => "Шаблон не найден"
                
            ],404);

        }
        return response()->json([
            "status" => true,
            "template" => $template
            
        ]);
    }
}
