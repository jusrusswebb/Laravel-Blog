@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="mb-4" style="font-family: 'Lora', serif;">Your Dashboard</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">Create New Post</a>

    <a href="{{ route('posts.index') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">View Posts</a>

    @if ($posts->isEmpty())
        <p style="font-family: 'Lora', serif;">No posts found.</p>
    @else
        @foreach ($posts as $post)
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body d-flex align-items-start">
                    <div class="flex-grow-1 me-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-dark fw-bold" style="font-family: 'Lora', serif; font-size: 1rem;">{{ $post->user->name }}</span>
                        </div>
                        <h2 class="card-title mb-3" style="font-family: 'Lora', serif;">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                        </h2>
                        <p class="card-text" style="font-family: 'Lora', serif;">
                            {{ Str::limit($post->content, 150) }} 
                        </p>
                    </div>

                    @if ($post->image)
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="max-width: 200px; height: auto;">
                        </div>
                    @endif
                </div>

                <div class="mt-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-dark btn-sm mr-1" style="font-family: 'Lora', serif;">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" style="font-family: 'Lora', serif;">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
