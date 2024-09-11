@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="font-family: 'Lora', serif;">Edit Post</h1>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="file" name="image" id="image" class="form-control" style="font-family: 'Lora', serif;" onchange="previewImage()">
                    
                    <div id="imagePreview" class="mt-3">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" id="currentImagePreview">
                        @endif
                    </div>
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
<script>
function previewImage() {
    const file = document.getElementById('image').files[0];
    const preview = document.getElementById('imagePreview');
    const reader = new FileReader();

    reader.onloadend = function () {
        preview.innerHTML = '';
        const img = document.createElement('img');
        img.src = reader.result;
        img.classList.add('img-fluid');
        preview.appendChild(img);
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
}
</script>
@endsection

