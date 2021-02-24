<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    protected $table = 'episodes';
    public $timestamps = false;

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }
}
