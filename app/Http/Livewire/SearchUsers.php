<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use App\Models\Vote;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
