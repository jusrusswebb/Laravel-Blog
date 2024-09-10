@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Your Dashboard</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-outline-dark mb-3">Create New Post</a>

    @if ($posts->isEmpty())
        <p>No posts found.</p>
    @else
        @foreach ($posts as $post)
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-3">{{ $post->title }}</h2>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3" style="max-width: 150px;">
                    @endif
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-dark btn-sm me-2">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection