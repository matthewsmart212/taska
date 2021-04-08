<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_user')->insert([
            'team_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('team_user')->insert([
            'team_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('team_user')->insert([
            'team_id' => 2,
            'user_id' => 3,
        ]);
        DB::table('team_user')->insert([
            'team_id' => 3,
            'user_id' => 4,
        ]);
    }
}
