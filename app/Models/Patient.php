<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name','polis_num', 'polis_comp','polis_type','pasport_num','pasport_serial','pasport_who','pasport_date','snils','gender','work_place','id_work','dob','dob_place','registration','phone','resident','soc_status','invalid'];

    public $timestamps = false;

    public function visit_log()
    {
        return $this->hasMany(Visit_log::class, 'id_patient', 'id');
    }
}
