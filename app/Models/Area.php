<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'title',
        'location',
        'description',
        'photo'
    ];

    protected $casts = [
        'photo' => 'array'
    ];

    public function kavlings()
    {
        return $this->hasMany(Kavling::class);
    }
}
