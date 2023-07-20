<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductComponent extends Component
{

    public $user;
    public $product;
    public $isProductInCar = false;


    public function mount(Product $product)
    {
        $this->product = $product;
        $this->user = $this->product->getUser();
    }


    public function render()
    {
        return view('livewire.product-component', ['products' => $this->product->listAllProducts()]);
    }

    public function activeProductIsInCarAlert()
    {
        $this->isProductInCar = true;
    }

    public function addToCar(int $productId)
    {
        $this->product->checkProductInCarList($productId, $this->user) ? $this->product->attachProduct($productId, $this->user) :
            $this->activeProductIsInCarAlert();
    }
}
