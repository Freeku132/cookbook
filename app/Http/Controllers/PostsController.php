<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
        ]);
    }


    public function store(PostFormRequest $request)
    {
//        $fields  = [
//            'slug' => Str::slug($request->title),
//            'user_id' => 1,
//            'title' => $request->title,
//            'body' => $request->body
//            ];
//        //dd($fields);
//        Post::create($fields);
        $request->updateOrCreate(new Post());

        return redirect('/posts')->with('success_message', 'Post create completed');
    }


    public function show(Post $post)
    {
        $post = Post::where('id', $post->id)->first();

        return view('posts.show',[
            'post' => $post]);
    }


    public function edit(Post $post)
    {

        return view('posts.edit',[
            'post' => $post]);
    }


    public function update(PostFormRequest $request, Post $post)
    {
//        $fields  = [
//            'slug' => Str::slug($request->title),
//            'user_id' => 1,
//            'title' => $request->title,
//            'body' => $request->body
//        ];
//        $post->update($fields);
        $request->updateOrCreate($post);

        return redirect('post/'.$post['slug'])->with('success_message', 'Post update completed');

    }


    public function destroy($id)
    {
        //
    }
}
