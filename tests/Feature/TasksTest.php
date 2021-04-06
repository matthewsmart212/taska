<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksTest extends TestCase
{

    use withFaker, RefreshDatabase;

    /** @test */
    public function logged_in_user_can_see_tasks()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();
        $group = Group::factory()->create(['project_id'=>$project->id]);
        $tasks = Task::factory()->count(3)->create(['group_id'=>$group->id]);

        $response = $this->get($project->path());

        foreach ($tasks as $task) {
            $response->assertSeeText($task->title);
        }
    }

    /** @test */
    public function logged_in_user_can_view_a_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();
        $group = Group::factory()->create(['project_id'=>$project->id]);
        $task = Task::factory()->create(['group_id'=>$group->id]);

        $this->get($task->path())->assertSuccessful()->assertSeeText($task->title);
    }

    /** @test */
    public function logged_in_user_can_create_a_task()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();
        $group = Group::factory()->create(['project_id'=>$project->id]);
        $attributes = ['group_id'=>$group->id,'title'=>$this->faker->title,'description'=>$this->faker->sentence];

        $response = $this->post($project->path() . '/tasks',$attributes);

        $this->assertDatabaseHas('tasks', $attributes);

        $response->assertStatus(302);
    }

    /** @test */
    public function logged_in_user_can_update_a_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();
        $group = Group::factory()->create(['project_id'=>$project->id]);
        $task = Task::factory()->create(['group_id'=>$group->id]);

        $attributes = ['group_id'=>$group->id,'title'=>$this->faker->title,'description'=>$this->faker->sentence];

        $this->put($project->path() . '/tasks/'.$task->id,$attributes);
        $this->assertDatabaseHas('tasks', $attributes);
    }
}
