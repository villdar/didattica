<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'votesCount' => $post->votes()->count(),
            'backUrl' => url()->previous() !== url()->full() && url()->previous()
                ? url()->previous()
                : route('home'),
        ]);
    }

    public function postBody(Request $request)
    {
        $chord = $request->get('chordId');

        $posts = Post::select('posts.*', 'categories.slug as category_slug')
        // aggiunge un altro campo dalla tabella categories
            ->join('categories', function ($builder) {
                $builder->on('categories.id', '=', 'posts.category_id');
            })
                ->where('name', '=', Str::before($chord, '.'))
                ->get();
        return view('components.article')->with(array('posts' => $posts));
    }
}
