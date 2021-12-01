<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserActivity extends Component
{
    public $ActivityFilter = ['Likes', 'Comments'];

    public function setFilter($newFilter)
    {
        $this->ActivityFilter = $newFilter;
        $this->emit('queryStringUpdatedActivityFilter', $this->ActivityFilter);
    }

    public function render()
    {
        return view('livewire.user-activity');
    }
}
