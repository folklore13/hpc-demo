<?php

namespace Tests\Feature\Product;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_a_new_product(): void
    {
        $admin = User::factory()->asAdmin()->create();
        $data = [
            "name" => fake()->word(),
            "category_id" => Category::factory()->create()->id,
            "description" => fake()->paragraph(),
            "price" => 200,
            "image" => fake()->imageUrl()
        ];
        $response = $this->actingAs($admin)
            ->post('/products', $data);

        $response->assertOk();
    }
}
