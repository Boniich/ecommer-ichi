<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class CarComponent extends Component
{

    public $check = false;
    public $newData;
    public $data;

    protected $listeners = [
        'getCar' => 'getCar'
    ];

    public function mount()
    {
        $this->getCar();
    }

    public function getCar()
    {
        $this->data = User::find(Auth()->user()->id);
        $this->newData = $this->data->products;
    }

    public function render()
    {
        if ($this->check) {
            dd($this->newData);
        }
        return view('livewire.car-component', ['newData' => $this->newData]);
    }

    public function remove($id)
    {
        $this->data->products()->detach($id);
        $this->data = User::find(Auth()->user()->id);
        $this->newData = $this->data->products;
        // $this->emit('getCar');
        $this->check = !true;
    }
}
