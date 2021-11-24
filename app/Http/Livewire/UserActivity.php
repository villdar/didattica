<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserActivity extends Component
{
    public bool $toggleA = false;

    public function render()
    {
        return view('livewire.user-activity');
    }
}
