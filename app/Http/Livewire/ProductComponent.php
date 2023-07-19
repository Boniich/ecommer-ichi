<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductComponent extends Component
{



    public function render()
    {

        $products = Product::all();

        return view('livewire.product-component', compact('products'));
    }

    public function addToCar(int $productId)
    {

        $user = User::select('id')->find(Auth::user()->id);

        $user->products()->attach($productId);
    }
}
