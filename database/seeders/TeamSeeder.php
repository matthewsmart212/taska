<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'title' => 'Web Development',
        ]);

        DB::table('teams')->insert([
            'title' => 'Marketing',
        ]);

        DB::table('teams')->insert([
            'title' => 'Design',
        ]);
    }
}
