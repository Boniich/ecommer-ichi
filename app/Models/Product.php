<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user');
    }


    public function listAllProducts()
    {
        return $this->all();
    }

    public function checkProductInCarList(int $productId, $user)
    {
        try {
            //si lo encuentra, no falla pero no se debe agregar producto al carrito
            //si no lo encuentra, falla pero devuelve TRUE para agregar el producto al carrito
            // $this->user->products()->findOrFail($productId);
            $user->products()->findOrFail($productId);

            return false;
        } catch (ModelNotFoundException $th) {
            return true;
        }
    }

    public function attachProduct(int $productId, $user)
    {
        $user->products()->attach($productId);
    }
}
