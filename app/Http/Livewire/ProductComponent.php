<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {

        $products = Product::all();

        return view('livewire.product-component', compact('products'));
    }

    public function addToCar()
    {

        $user = User::find(1);

        $user->products()->attach(1);

        dd($user->products);
    }
}
