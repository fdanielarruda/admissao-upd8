<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable = [
        'cpf',
        'name'
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_representatives', 'representative_id', 'city_id');
    }
}
