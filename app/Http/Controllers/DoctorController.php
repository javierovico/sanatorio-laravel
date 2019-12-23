<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function optenerEspecialidades(){
        return ['purete'=>true];
    }

}
