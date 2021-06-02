<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchsController extends Controller
{
    public function delete($id){
        Branch::where('id', $id)->delete();

        return back();
    }
}
