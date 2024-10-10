<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_a_product(): void
    {
        $admin = User::factory()->asAdmin()->create();
        $product = Product::factory()->create();
        $response = $this->actingAs($admin)->put("/products/$product", [
            'name' => 'Test Edit Product',
            'description' => 'Test Edit Description',
            'price' => 20000,
            'image' => fake()->imageUrl()
        ]);

        $response->assertSuccessful();
    }
}
