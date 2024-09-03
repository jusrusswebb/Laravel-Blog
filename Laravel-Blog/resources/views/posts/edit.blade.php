<!-- Form to Edit an Existing Post -->
<h1>Edit Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $post->title }}">
    <label>Content:</label>
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form>
