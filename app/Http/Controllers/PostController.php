<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Facade\FlareClient\View;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(1)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'backUrl' => url()->previous() !== url()->full() && url()->previous()
                ? url()->previous()
                : route('posts.index'),
        ]);
    }

    public function postBody(Request $request)
    {
        $chord = $request->get('chordId');

        $posts = Post::select('posts.*', 'categories.slug as category_slug') // add other fields you need from categories table
            ->join('categories', function ($builder) {
                $builder->on('categories.id', '=', 'posts.category_id');
            })
                ->where('name', '=', Str::before($chord, '.'))
                ->get();



        // dd($posts);
        return view('components.article')->with(array('posts' => $posts));
        // return $posts;
    }
}
