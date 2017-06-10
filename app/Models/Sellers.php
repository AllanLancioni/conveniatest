<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    protected $fillable = [
        'name', 'email', 'age', 'country'
    ];

    public $timestamps = false;
}
