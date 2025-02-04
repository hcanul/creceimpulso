<?php

namespace App\Models;

use App\Traits\HasCityScope;
use Illuminate\Database\Eloquent\Model;

class DatabaseConnection extends Model
{
    use HasCityScope;

    protected $fillable = [ 'office_name', 'city_id', 'db_name', 'db_user', 'db_password', 'db_host', 'db_port', 'db_host_local', 'db_user_local', 'db_password_local' ];

    //Todo: Relationship

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }
}
