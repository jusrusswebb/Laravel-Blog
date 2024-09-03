<!-- Form to Create a New Post -->
<h1>Create Post</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title">
    <label>Content:</label>
    <textarea name="content"></textarea>
    <button type="submit">Save</button>
</form>
