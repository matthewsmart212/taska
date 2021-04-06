<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'project_id' => 1,
            'title' => 'Task one',
            'description' => 'This is the description for one'
        ]);

        DB::table('tasks')->insert([
            'project_id' => 1,
            'title' => 'Task two',
            'description' => 'This is the description for one'
        ]);

        DB::table('tasks')->insert([
            'project_id' => 1,
            'title' => 'Task three',
            'description' => 'This is the description for one'
        ]);

        DB::table('tasks')->insert([
            'project_id' => 2,
            'title' => 'Task one',
            'description' => 'This is the description for one'
        ]);

        DB::table('tasks')->insert([
            'project_id' => 2,
            'title' => 'Task two',
            'description' => 'This is the description for one'
        ]);
    }
}
