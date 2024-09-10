@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="font-family: 'Lora', serif;">Edit Post</h1>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label" style="font-family: 'Lora', serif;">Image:</label>
                    <input type="file" name="image" id="image" class="form-control" style="font-family: 'Lora', serif;">
                    
                    @if ($post->image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-outline-dark">Update</button>
            </form>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete Post</button>
            </form>
        </div>
    </div>
</div>
@endsection

