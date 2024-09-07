@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <h1 class="card-title mb-3" style="font-family: 'Lora', serif;">{{ $post->title }}</h1>
            <p class="card-text mb-3" >{{ $post->content }}</p>
            <p class="text-muted mb-4">Posted by: {{ $post->user->name }}</p>
        </div>
    </div>

    <div class="mb-4">
        <h4 class="mb-3">Comments:</h4>
        @foreach ($post->comments as $comment)
            <div class="alert alert-light border-0 mb-2 p-2">
                <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>

                @if (Auth::check() && Auth::id() === $comment->user_id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    @auth
        <form action="{{ route('comments.storeComment', $post->id) }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment..."></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Comment</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}" class="text-primary">log in</a> to comment.</p>
    @endauth
</div>
@endsection


