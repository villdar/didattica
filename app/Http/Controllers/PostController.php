<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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
            'post' => $post
        ]);
    }

    public function postBody(Request $request)
    {
        $chord = $request->get('chordId');

        //$chord = Str::contains($chord, ['Valutazione tra pari']);

        $category = Post::join('categories', function ($builder) {
            $builder->on('categories.id', '=', 'posts.category_id');
        })
        ->where('name', '=', Str::before($chord, '.'))
        ->get();


        // dump($category);

        return $category;
    }
}
