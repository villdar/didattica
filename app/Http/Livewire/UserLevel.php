<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Vote;
use Livewire\Component;

class UserLevel extends Component
{
    public $level = 1;
    public $exp;
    public $user;

    public $comments;
    public $votes;

    public $bar;


    public function mount()
    {
        $this->user = auth()->user()->id;
        $this->comments = Comment::where('user_id', $this->user)->count();
        $this->votes = Vote::where('user_id', $this->user)->count();
        $this->exp = ($this->comments * 2) + ($this->votes * 0.5);
        $this->level += floor($this->exp / 100);
        $this->bar = $this->exp % 100;


        // dd($this->bar);
    }

    public function render()
    {
        return view('livewire.user-level');
    }
}
