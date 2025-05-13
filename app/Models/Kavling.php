<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kavling extends Model
{
    protected $fillable = [
        'area_id',
        'title',
        'location',
        'description',
        'price',
        'photo'
    ];

    protected $casts = [
        'photo' => 'array'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
