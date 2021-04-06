<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'task_id' => 1,
            'user_id' => 1,
            'comment' => 'This is the first comment',
        ]);

        DB::table('comments')->insert([
            'task_id' => 1,
            'user_id' => 1,
            'comment' => 'This is the second comment',
        ]);

        DB::table('comments')->insert([
            'task_id' => 1,
            'user_id' => 1,
            'comment' => 'This is the third comment',
        ]);
    }
}
