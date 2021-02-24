<?php

namespace App\Models;

use App\Models\Qualifiers\Media;
use App\Models\Producers\Creator;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    public function media()
    {
        return $this->belongsToMany(Media::class)->withPivot('active', 'slug');
    }

    public function creators()
    {
        return $this->belongsToMany(Creator::class)->withPivot('order');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

}
