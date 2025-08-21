<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin-dashboard')
            ->layout('layouts.dashboard'); // Use the new dashboard layout
    }
}