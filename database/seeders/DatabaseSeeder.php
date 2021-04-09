<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            GroupSeeder::class,
            TaskSeeder::class,
            CommentSeeder::class,
            TeamSeeder::class,
            TeamUserSeeder::class,
            ProjectTeamSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
