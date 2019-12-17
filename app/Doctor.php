<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctores';
    protected $primaryKey = 'cedula';
    public $incrementing = false;

    protected $fillable = ['cedula'];
}
