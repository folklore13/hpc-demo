<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_edit_category(): void
    {
        $admin = User::factory()->asAdmin()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($admin)->put("/categories/$category", [
            "name" => "Test Edit Name"
        ]);

        $response->assertSuccessful();
    }
}
