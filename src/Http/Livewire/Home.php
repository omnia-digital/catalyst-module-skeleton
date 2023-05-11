<?php

namespace OmniaDigital\Catalyst\SkeletonModule\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('skeleton::livewire.home');
    }
}
