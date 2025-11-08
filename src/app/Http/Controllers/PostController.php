<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    # Apply auth middleware for all actions except index and show
    public function __construct () {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     * 
     * GET /
     */
    public function index () {
        $posts = Post::with('user')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * GET /post/create
     */
    public function create () {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * POST /post
     */
    public function store (StorePostRequest $request) {
        $post = Auth::user()->posts()->create($request->validated());
        return redirect()->route('post.show', $post);
    }

    /**
     * Display the specified resource.
     * 
     * GET /post/{post}
     */
    public function show (Post $post) {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * GET /post/{post}/edit
     */
    public function edit (Post $post) {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * PUT /post/{post}
     */
    public function update (UpdatePostRequest $request, Post $post) {
        $this->authorize('update', $post);
        $post->update($request->validated());
        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * DELETE /post/{post}
     */
    public function destroy (Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('home');
    }
}
