<!-- List of Posts -->
<h1>Posts</h1>
<a href="{{ route('posts.create') }}">Create New Post</a>
@foreach ($posts as $post)
    <div class="post">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Posted by: {{ $post->user->name }}</p> <!-- Display creator's name -->
        
        @if (Auth::check() && Auth::id() === $post->user_id)
            <!-- Show edit and delete buttons only if the current user is the owner of the post -->
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
    </div>
@endforeach