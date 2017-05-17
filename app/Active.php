<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [
        'switch'
    ];
}