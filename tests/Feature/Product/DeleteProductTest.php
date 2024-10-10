<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_a_product(): void
    {
        $admin = User::factory()->asAdmin()->create();
        $product = Product::factory()->create();
        $response = $this->actingAs($admin)->delete("/products/" . $product);

        $response->assertStatus(204);
    }
}
