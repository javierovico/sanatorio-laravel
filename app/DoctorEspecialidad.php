<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DoctorEspecialidad extends Model
{
    protected $table = 'doctores_especialidades';
    protected $primaryKey = ['doctor','especialidad'];
    protected $fillable = ['doctor','especialidad'];
    public $incrementing = false;

    public function doctor(){
        return $this->hasOne('App\Doctor','cedula','doctor');
    }

    public function especialidad(){
        return $this->hasOne('App\Especialidad','id','especialidad');
    }

    /**
     * @return array|mixed
     * Ambos funciones overrides de abajo son para trabajar con dos claves primarias
     */
    protected function getKeyForSaveQuery(){

        $primaryKeyForSaveQuery = array(count($this->primaryKey));

        foreach ($this->primaryKey as $i => $pKey) {
            $primaryKeyForSaveQuery[$i] = isset($this->original[$this->getKeyName()[$i]])
                ? $this->original[$this->getKeyName()[$i]]
                : $this->getAttribute($this->getKeyName()[$i]);
        }

        return $primaryKeyForSaveQuery;

    }

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query){

        foreach ($this->primaryKey as $i => $pKey) {
            $query->where($this->getKeyName()[$i], '=', $this->getKeyForSaveQuery()[$i]);
        }

        return $query;
    }

}
