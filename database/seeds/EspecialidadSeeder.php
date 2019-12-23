<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        if(1==1){   //todo: deshabilitar al importar
            return;
        }
        $especialidades = ["Alergología","Anestesiología","Cardiología","Gastroenterología","Endocrinología","Geriatría","Hematología","Infectología","Medicina aeroespacial","Medicina del deporte","Medicina del trabajo","Medicina de urgencias","Medicina familiar y comunitaria","Medicina física y rehabilitación","Medicina intensiva","Medicina interna","Medicina forense","Medicina preventiva y salud pública","Nefrología","Neumología","Neurología","Nutriología","Oncología médica","Oncología radioterápica","Pediatría","Psiquiatría","Reumatología","Toxicología","Cirugía cardíaca","Cirugía general","Cirugía oral y maxilofacial","Cirugía ortopédica","Cirugía pediátrica","Cirugía plástica","Cirugía torácica","Neurocirugía","Angiología","Dermatología","Ginecología y obstetricia o tocología","Oftalmología","Otorrinolaringología","Urología","Traumatología","Análisis clínico","Anatomía patológica","Bioquímica clínica","Farmacología","Genética médica","Inmunología","Medicina nuclear","Microbiología y parasitología","Neurofisiología clínica","Radiología"];
        foreach ($especialidades as $especialidad){
            $espe = new \App\Especialidad(['nombre'=>$especialidad]);
            $espe->save();
        }
    }
}
