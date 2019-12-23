<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $fillable = ['nombre'];

    public function especialidadesId(){
        return $this->hasMany('App\DoctorEspecialidad','especialidad','id');
    }
}
