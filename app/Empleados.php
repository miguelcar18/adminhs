<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empleados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'cedula', 'rif', 'cargo', 'fecha_ingreso', 'email', 'usuarioSlack', 'path'];

    public function nombreCargo()
    {
        return $this->hasOne('App\Cargos', 'id', 'cargo');
    }
}
