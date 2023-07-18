<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class CarComponent extends Component
{

    public $newData;
    public $user;

    protected $listeners = [
        'refreshCar' => 'refreshCar'
    ];

    public function mount()
    {
        $this->user = User::find(Auth()->user()->id);
        $this->refreshCar();
    }

    public function refreshCar()
    {
        $this->newData = $this->user->products;
    }

    public function render()
    {
        return view('livewire.car-component');
    }

    public function remove($id)
    {
        $this->user->products()->detach($id);
        $this->emit('refreshCar');
    }
}
