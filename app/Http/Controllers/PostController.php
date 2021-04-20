<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = \App\Models\Post::get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check()){
        return view('posts.create');
        }else{
            return redirect('/posts') ->with('Alert', 'Please Log-In First!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect('/posts');
        }else{
            return redirect('/posts') ->with('Alert', 'Please Log-In First!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post = \App\Models\Posts::find($id);
        return view('posts.show', compact('posts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        if(Auth::check()){
        $post = \App\Models\Posts::find($id);
        return view('posts.edit', compact('posts'));
        }else{
            return redirect('/posts') ->with('Alert', 'Please Log-In First!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        if(Auth::check()){
        $post = \App\Models\Posts::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        

        return redirect('/posts');
    }else {
        return redirect('/posts') ->with('Alert', 'Please Log-In First!');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if(Auth::check()){
            $post = \App\Models\Post::find($id);
            $post->delete();
            return redirect('/posts');
        }else {
            return redirect('/posts') ->with('Alert', 'Please Log-In First!');
        }

    }
}
