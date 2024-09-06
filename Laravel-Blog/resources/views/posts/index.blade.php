@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <a href="{{ route('posts.create') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">Create New Post</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">Create New Post</a>
    @endauth

    @foreach ($posts as $post)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-3" style="font-family: 'Lora', serif;"><a href="{{ route('posts.show', $post->id) }}" class="text-dark text-decoration-none">{{ $post->title }}</a></h2>
                
                <p class="text-muted mb-3" style="font-family: 'Lora', serif;">- {{ $post->user->name }}</p>
                
                @if (Auth::check() && Auth::id() === $post->user_id)
                    <div class="d-flex">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-dark btn-sm me-2">Edit</a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection






