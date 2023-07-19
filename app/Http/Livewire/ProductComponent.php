<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        $products = $this->listAllProducts();

        return view('livewire.product-component', compact('products'));
    }

    public function listAllProducts()
    {
        return Product::all();
    }


    public function getUser()
    {
        return User::select('id')->find(Auth::user()->id);
    }

    public function checkProductInCarList(int $productId)
    {
        try {
            //si lo encuentra, no falla pero no se debe agregar producto al carrito
            //si no lo encuentra, falla pero devuelve TRUE para agregar el producto al carrito
            $this->user->products()->findOrFail($productId);
            return false;
        } catch (ModelNotFoundException $th) {
            return true;
        }
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
        $this->checkProductInCarList($productId) ? $this->attachProduct($productId) :
            $this->activeProductIsInCarAlert();
    }
}
