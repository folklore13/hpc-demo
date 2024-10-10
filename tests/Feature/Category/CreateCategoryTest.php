<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    public function test_create_category()
    {
        $admin = User::factory()->asAdmin()->create();
        $response = $this->actingAs($admin)
            ->post("/categories", [
                "name" => "Test Name",
            ]);

        $response->assertCreated();
    }
}
