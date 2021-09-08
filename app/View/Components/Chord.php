<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\Component;

class Chord extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chord', [
            'categories' => Category::withCount('posts')->get(),
        ]);
    }
}
