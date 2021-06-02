<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['Name','dob', 'prof_name','id_profession','id_branch','status','cabinet','id_user','work_day'];

    public function timetable()
    {
        return $this->hasMany(Timetable::class, 'id_doctor', 'id');
    }
    public function visit()
    {
        return $this->hasMany(Visit_log::class, 'id_doctor', 'id');
    }
    public function profession()
    {
        return $this->hasOne(Profession::class,  'id' , 'id_profession');
    }
}
