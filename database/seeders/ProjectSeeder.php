<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'description' => 'This is the description for one'
        ]);

        DB::table('projects')->insert([
            'title' => 'Project two',
            'description' => 'This is the description for two'
        ]);

        DB::table('projects')->insert([
            'title' => 'Project three',
            'description' => 'This is the description for three'
        ]);


    }
}
