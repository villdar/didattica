<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Post;
use Livewire\Component;

class PostVotes extends Component
{
    use WithAuthRedirects;

    public $post;
    public $votesCount;
    public $hasVoted;

    public function mount(Post $post, $votesCount)
    {
        $this->post = $post;
        $this->votesCount = $votesCount;
        $this->hasVoted = $post->isVotedByUser(auth()->user());
    }

    public function vote()
    {
        if (auth()->guest()) {
            return $this->redirectToLogin();
        }

        if ($this->hasVoted) {
            try {
                $this->post->removeVote(auth()->user());
            } catch (VoteNotFoundException $e) {
                // do nothing
            }
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try {
                $this->post->vote(auth()->user());
            } catch (DuplicateVoteException $e) {
                // do nothing
            }
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }

    public function render()
    {
        return view('livewire.post-votes');
    }
}
