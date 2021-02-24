<?php

namespace Database\Seeders;

use App\Models\Qualifiers\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = [
            ['name' => 'Blu-Ray', 'slug' => 'bd'],
            ['name' => 'DVD', 'slug' => 'dvd'],
            ['name' => 'HD', 'slug' => 'hd'],
            ['name' => 'Google Play', 'slug' => 'google-play'],
            ['name' => 'Microsoft Movies', 'slug' => 'ms-movies'],
            ['name' => 'Netflix', 'slug' => 'netflix', 'isstream' => true],
            ['name' => 'Prime Vídeo', 'slug' => 'prime-video', 'isstream' => true],
            ['name' => 'Globo Play', 'slug' => 'globo-play', 'isstream' => true],
            ['name' => 'Disney', 'slug' => 'disney', 'isstream' => true],
            ['name' => 'Oldflix', 'slug' => 'oldflix', 'isstream' => true],
            ['name' => 'Mega', 'slug' => 'mega'],
            ['name' => 'Dropbox', 'slug' => 'dropbox'],
        ];

        foreach ($media as $arr) {
            Media::create($arr);
        }
    }
}
