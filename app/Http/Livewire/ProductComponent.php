<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductComponent extends Component
{

    public $isProductInCar = false;
    public $user;


    public function mount()
    {
        $this->user = $this->getUser();
    }


    public function render()
    {

        $products = Product::all();

        return view('livewire.product-component', compact('products'));
    }

    public function getUser()
    {
        return User::select('id')->find(Auth::user()->id);
    }

    public function checkProductInCarList(int $productId)
    {
        return $this->user->products()->find($productId);
    }

    public function attachProduct(int $productId)
    {
        $this->user->products()->attach($productId);
    }

    public function activeProductIsInCarAlert()
    {
        $this->isProductInCar = true;
    }

    public function addToCar(int $productId)
    {
        is_null($this->checkProductInCarList($productId)) ? $this->attachProduct($productId) :
            $this->activeProductIsInCarAlert();
    }
}
