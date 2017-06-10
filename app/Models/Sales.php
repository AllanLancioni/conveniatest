<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'price', 'title', 'describe', 'seller_id'
    ];

    public $timestamps = false;
}
