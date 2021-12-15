<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    public function __invoke()
    {
        return view('admin.posts.analytics');
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->pros = $request->pros;
        $post->cons = $request->cons;
        $post->excerpt = $request->excerpt;

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('_', $imageName)[0];
            $fileExtention = time() . '_' . $imageNewName;
            $location = storage_path('app/public/' . $fileExtention);
            Image::make($image)->resize(280, 140)->save($location);
            $post->thumbnail = $fileExtention;
        };

        $post->save();
        $post->tags()->sync($request->tags);

        // Post::create(array_merge($this->validatePost(), [
        //     'user_id' => request()->user()->id,
        //     'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
        // ]));
        // // $post->tags()->saveMany($post->getKey('id'), $request->tags_id);

        return redirect('/')->with('success', 'Nuovo strumento aggiunto!');
    }

    public function edit(Post $post)
    {
        $tags           = Tag::all();
        $categories     = Category::all();
        $oldTags        = $post->tags->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'tags', 'categories', 'oldTags'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->pros = $request->pros;
        $post->cons = $request->cons;
        $post->excerpt = $request->excerpt;

        if ($request->hasFile('thumbnail')) {
            $oldFileName    = $post->thumbnail;
            $image          = $request->file('thumbnail');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('-', $imageName)[0];
            $fileExtention  = time() . '_' . $imageNewName;
            $location       = storage_path('app/public/' . $fileExtention);
            Image::make($image)->resize(280, 140)->save($location);
            $post->thumbnail = $fileExtention;
            File::delete(storage_path('app/public/thumbnails/' . $oldFileName));
        };

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect('/admin/posts')->with('success', 'Strumento modificato!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Strumento cancellato!');
    }

    // protected function validatePost(?Post $post = null): array
    // {
    //     $post ??= new Post();

    //     return request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
    //         'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
    //         'excerpt' => 'required',
    //         'pros' => 'required',
    //         'cons' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')],
    //         'tags_id' => ['required', 'array', 'min:1'],
    //         'tags_id.*' => ['required', Rule::exists('tags', 'id')],
    //         'post_tag' => ['post_id', 'tag_id']
    //     ]);
    // }
}
