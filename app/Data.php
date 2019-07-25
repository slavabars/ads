<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $timestamps = true;

    protected $table = 'data';
    protected $casts = [
        'data'=>'array'
    ];
    protected $fillable = [
        'id', 'data', 'access'
    ];

}
