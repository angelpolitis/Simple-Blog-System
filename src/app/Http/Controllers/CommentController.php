<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    public function __construct () {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index () {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create () {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * POST /post/{post}/comment
     */
    public function store (Request $request, Post $post) {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('post.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show (string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update (Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (string $id) {
        //
    }
}
