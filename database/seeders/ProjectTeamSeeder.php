<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_team')->insert([
            'project_id' => 1,
            'team_id' => 1,
        ]);
        DB::table('project_team')->insert([
            'project_id' => 1,
            'team_id' => 2,
        ]);
        DB::table('project_team')->insert([
            'project_id' => 2,
            'team_id' => 1,
        ]);
        DB::table('project_team')->insert([
            'project_id' => 3,
            'team_id' => 3,
        ]);
    }
}
