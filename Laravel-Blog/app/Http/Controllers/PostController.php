<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); 
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized access');
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized access');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($imagePath && \Storage::exists('public/' . $imagePath)) {
                \Storage::delete('public/' . $imagePath);
            }
            
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath, 
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized access');
        }
        if ($post->image && \Storage::exists('public/' . $post->image)) {
            \Storage::delete('public/' . $post->image);
        }
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}
