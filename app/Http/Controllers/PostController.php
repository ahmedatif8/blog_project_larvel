<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\post;


class PostController extends Controller
{
    //
    public function index()
    {
        $posts = post::paginate();
        return view('posts.index', ['posts' => $posts]);
    }
    public function home()
    {
        $posts = post::paginate();
        return view('posts.home', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function edit($id)
    {
        $post = post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }
    public function show($id)
    {
        $post = post::findOrFail($id);
        return view('posts.view', ['post' => $post]);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'max:1000'],
            'user_id' => ['required', 'exists:users,id']
        ]);
        $post = post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect('posts')->with('success', 'post updated successfully');
    }
    public function destroy($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return back()->with('success', 'post deleted successfully');

    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'max:1000'],
            'user_id' => ['required', 'exists:users,id']
        ]);
        $post = new post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return back()->with('success', 'post added successfully');
    }
}
