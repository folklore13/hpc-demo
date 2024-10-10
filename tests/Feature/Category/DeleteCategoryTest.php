<?php

namespace Tests\Feature\Category;

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_a_category(): void
    {
        $admin = User::factory()->asAdmin()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($admin)->delete("/categories/$category->id");
        $response->assertSuccessful();
    }
}
