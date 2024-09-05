<!-- Display a Single Post -->
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<a href="{{ route('posts.edit', $post->id) }}">Edit</a>

<!-- Display comments -->
<h3>Comments</h3>
@foreach($post->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong> said:
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

<!-- Comment form -->
@auth
    <form action="{{ route('posts.storeComment', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endauth