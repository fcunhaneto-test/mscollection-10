<?php

namespace App\Models\Qualifiers;

use App\Models\Movie;
use App\Models\Series;
use App\Models\Season;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withPivot('active', 'slug');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class)->withPivot('active', 'slug');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class)->withPivot('active', 'slug');
    }

    public function isStream() {
        return $this->where('isstream', true)->where('active', true)->get();
    }

    public function isActive() {
        return $this->where('active', true)->get();
    }
}
