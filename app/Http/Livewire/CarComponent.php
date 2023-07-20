<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class CarComponent extends Component
{

    public $newData;
    public $user;
    public $total = 0;

    protected $listeners = [
        'loadShoppingCar' => 'loadShoppingCar'
    ];

    public function mount(User $user)
    {
        $this->user = $user->getAuthenticateUser();
        $this->loadShoppingCar();
    }

    public function loadShoppingCar()
    {
        $this->newData = $this->user->products;
        $this->calculateTotalPrice();
    }

    private function calculateTotalPrice()
    {
        $this->total = 0;
        foreach ($this->newData as $oneData) {
            $this->total += $oneData->price;
        }
    }

    public function render()
    {
        return view('livewire.car-component');
    }

    public function remove($id)
    {
        $this->user->products()->detach($id);
        $this->emit('loadShoppingCar');
    }
}
