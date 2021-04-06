<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'project_id' => 1,
            'title' => 'To do',
        ]);

        DB::table('groups')->insert([
            'project_id' => 1,
            'title' => 'Working On',
        ]);

        DB::table('groups')->insert([
            'project_id' => 1,
            'title' => 'Complete',
        ]);
    }
}
