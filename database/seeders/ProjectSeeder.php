<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => 'Project one',
            'background_image' => '/images/backgrounds/9.jpg',
        ]);

        DB::table('projects')->insert([
            'title' => 'Project two',
            'background_image' => '/images/backgrounds/8.jpg',
        ]);

        DB::table('projects')->insert([
            'title' => 'Project three',
            'background_image' => '/images/backgrounds/6.jpg',
        ]);
    }
}
