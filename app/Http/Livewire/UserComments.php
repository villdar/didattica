<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class UserComments extends Component
{
    use WithPagination;

    public $userId;
    public $comments;


    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->comments = Comment::orderBy('created_at', 'desc')->where('user_id', $this->userId)->get();
    }

    public function render()
    {
        return view('livewire.user-comments');
    }
}
