@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <a href="{{ route('posts.create') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">Create New Post</a>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">View Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">Create New Post</a>
    @endauth

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









