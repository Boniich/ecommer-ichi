<?php

namespace Tests\Feature;

use App\Http\Livewire\ProductComponent;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;


    public function test_show_all_products_to_buy(): void
    {
        Product::factory()->create();
        $this->actingAs(User::factory()->create());

        $component = Livewire::test(ProductComponent::class);

        dd($component);
    }
}
