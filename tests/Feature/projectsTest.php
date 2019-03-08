<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class projectsTest extends TestCase
{
    use withFaker, refreshdatabase;

    public function test_a_user_can_create_a_project()
    {
        $this->withExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function test_a_project_requires_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => ' ']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');

    }

    public function test_a_project_requires_a_description()
    {
        $attributes = factory('App\Project')->raw(['description' => ' ']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');

    }
}
