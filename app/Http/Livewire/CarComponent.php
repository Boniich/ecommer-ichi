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
        'refreshCar' => 'refreshCar'
    ];

    public function mount()
    {
        $this->user = User::find(Auth()->user()->id);
        $this->refreshCar(); // este metodo deberia cambiar de nombre. ya que al ser montado no tiene sentido que se llame 'refresh'
    }

    public function refreshCar()
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
        $this->emit('refreshCar');
    }
}
