<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctores';
    protected $primaryKey = 'cedula';
    public $incrementing = false;

    protected $fillable = ['cedula'];

    public function especialidadesId(){
//        return $this->belongsToMany('App\Doctor',)
        return $this->hasMany('App\DoctorEspecialidad','doctor','cedula');
    }
}
