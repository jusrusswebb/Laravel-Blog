<!-- Display a Single Post -->
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<a href="{{ route('posts.edit', $post->id) }}">Edit</a>
