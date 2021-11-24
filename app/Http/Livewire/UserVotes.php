<?php

namespace App\Http\Livewire;

use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class UserVotes extends Component
{
    use WithPagination;

    public $userId;
    public $votes;

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->votes = Vote::orderBy('created_at', 'desc')->where('user_id', $this->userId)->get();
    }

    public function render()
    {
        return view('livewire.user-votes');
    }
}
