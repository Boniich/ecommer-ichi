<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductComponent extends Component
{

    public $isProductInCar = false;


    public function render()
    {

        $products = Product::all();

        return view('livewire.product-component', compact('products'));
    }

    public function addToCar(int $productId)
    {

        $user = User::select('id')->find(Auth::user()->id);

        $product = $user->products()->find($productId);

        if (is_null($product)) {
            $user->products()->attach($productId);
        } else {
            $this->isProductInCar = true;
        }
    }
}
