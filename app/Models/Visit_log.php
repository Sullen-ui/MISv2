<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Visit_log extends Model
{
    use HasFactory;

    protected $fillable = ['uid','id_patient','id_doctor', 'visit_date','id_branch','status'];

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id');
    }

}
