<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CarComponent extends Component
{
    public function render()
    {
        $data = User::find(Auth()->user()->id);

        $newData = $data->products;

        // dd($newData);

        // dd($data->products[0]->name);

        return view('livewire.car-component', compact('newData'));
    }
}
