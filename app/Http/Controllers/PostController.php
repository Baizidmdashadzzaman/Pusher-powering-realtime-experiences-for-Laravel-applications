<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\TestNotification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('send-notification', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        // Create the post
        $post = Post::create([
            'author' => $request->input('author'),
            'title' => $request->input('title'),
        ]);

        // Dispatch the event with the post data
        event(new TestNotification([
            'author' => $post->author,
            'title' => $post->title,
        ]));

        // Redirect with success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
