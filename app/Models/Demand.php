<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = ['fecha',
                            'city_id',
                            'ncliente',
                            'nCredito',
                            'team_id',
                            'promoter_id',
                            'pNombre',
                            'sNombre',
                            'aPaterno',
                            'aMaterno',
                            'genero',
                            'fNacimiento',
                            'lNacimiento',
                            'pais',
                            'nacionalidad',
                            'tidentificaion',
                            'rfc',
                            'curp',
                            'nIdentificacion',
                            'ecivil',
                            'regimen',
                            'nescolar',
                            'oficio',
                            'dudcalle',
                            'dudne',
                            'dudni',
                            'dudcolonia',
                            'dudelegacion',
                            'dudciudad',
                            'dudcp',
                            'dudreferencia',
                            'dudusotelefono',
                            'dudtelefono',
                            'dudrecidencia',
                            'dfnombre',
                            'dftrtabaja',
                            'dfcocupacion',
                            'dfchijos',
                            'dfcdeconomicos',
                            'dseactividad',
                            'dseofinggresos',
                            'dseihogar',
                            'dsenphabitan',
                            'dseccvivienda',
                            'desmaterial',
                            'rfNombre',
                            'rfParentesco',
                            'rfTelefono',
                            'rfDomicilio',
                            'rfcp',
                            'rfOcupacion',
                            'rfLTrabajo',
                            'rpNombre',
                            'rpParentesco',
                            'rpTelefono',
                            'rpDomicilio',
                            'rpcp',
                            'rpOcupacion',
                            'rpLTrabajo',
                            'nempresa',
                            'fechaini',
                            'fechafin',
                            'total',
                            'nempresa2',
                            'fechaini2',
                            'fechafin2',
                            'total2',
                            'tfdirectivos',
                            'dNombre',
                            'ocupuesto',
                            'dNombre2',
                            'Observaciones',
                            'activo'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class)->select(['name']);
    }

    public function team()
    {
        return $this->belongsTo(Team::class)->select(['name']);
    }

    public function promoter()
    {
        return $this->belongsTo(Promoter::class)->select(['name']);
    }

    public function creditgroup()
    {
        return $this->hasMany(CreditGroup::class);
    }

    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }
}
