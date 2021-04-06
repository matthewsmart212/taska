<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use App\Models\User;

class ProjectsTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */
    public function logged_in_user_can_see_projects()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $projects = Project::factory()->count(5)->create();

        $response = $this->get('/projects')->assertSuccessful();

        foreach ($projects as $project) {
            $response->assertSeeText($project->title);
        }
    }

    /** @test */
    public function logged_in_user_can_view_a_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $project = Project::factory()->create();

        $this->get('/projects/'.$project->id)->assertSuccessful()->assertSeeText($project->title);
    }

    /** @test */
    public function logged_in_user_can_create_a_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $attributes = ['user_id'=>$user->id,'title'=>$this->faker->title,'description'=>$this->faker->sentence];

        $this->post('/projects',$attributes);
        $this->assertDatabaseHas('projects', $attributes);
    }

    /** @test */
    public function logged_in_user_can_update_a_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create();

        $attributes = ['user_id'=>$user->id,'title'=>$this->faker->title,'description'=>$this->faker->sentence];

        $this->put($project->path(),$attributes);
        $this->assertDatabaseHas('projects', $attributes);
    }
}
