<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Counter extends Component
{

    // public $count = 0;

    // public function increment()
    // {
    //     $this->count++;
    // }
    public $search = '';
    public function render()
    {
        return view('livewire.counter', [
            'users' => User::where('name', $this->search)->get(),
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.counter');
    // }
}
