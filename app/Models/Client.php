<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'cpf',
        'name',
        'birthdate',
        'gender',
        'address',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
