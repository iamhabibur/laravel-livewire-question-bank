<?php

namespace App\Livewire\Frontend; // Must match the folder structure

use Livewire\Component;

class HomePage extends Component // The class name must be HomePage
{
    public function render()
    {
        return view('livewire.frontend.home-page')
            ->layout('layouts.frontend')
            ->title('Welcome to our Portal');
    }
}