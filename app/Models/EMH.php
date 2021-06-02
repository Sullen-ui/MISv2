<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMH extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_patient','id_doctor','create_date', 'description', 'name'];

    public function doctor()
    {
        return $this->hasOne(Doctor::class,  'id' , 'id_doctor');
    }
}
