<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [

        'title',
        'address',
        'description',
        'logo'
    ];
}
