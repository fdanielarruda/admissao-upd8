<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'uf',
        'name'
    ];

    public function representatives()
    {
        return $this->belongsToMany(Representative::class);
    }
}
