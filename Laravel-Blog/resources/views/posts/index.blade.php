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
            <div class="card-body d-flex align-items-start">
                <div class="flex-grow-1 me-3">
                    <h2 class="card-title mb-3" style="font-family: 'Lora', serif;">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-dark text-decoration-none">{{ $post->title }}</a>
                    </h2>

                    <p class="text-muted mb-3" style="font-family: 'Lora', serif;">- {{ $post->user->name }}</p>

                    <p class="card-text" style="font-family: 'Lora', serif;">
                        {{ Str::limit($post->content, 150) }} <!-- Show a preview of the content -->
                    </p>
                </div>

                @if ($post->image)
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="max-width: 200px; height: auto;">
                    </div>
                @endif
                
            </div>
        </div>
    @endforeach
</div>
@endsection









