<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['city_id','team_id','promoter_id','cicloAnt','cicloNvo','solicitud','iniProp','iniDef','tasaAnt','tasaAut','noCliNvas','preAnt','totReq','noCreMaySP','solCre','revMontos','comEle','actaIntala','aprobado','pagado','impreso'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    /**
     * Funciones para las relaciones
     * entre tablas
     */

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class, 'tasaAut');
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function latepayment()
    {
        return $this->hasMany(Latepayment::class);
    }
}
