<?php

namespace App\Models\Producers;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directors';
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withPivot('order');
    }
}
