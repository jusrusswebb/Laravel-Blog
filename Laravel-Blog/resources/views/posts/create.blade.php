@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <h1 class="card-title mb-3" style="font-family: 'Lora', serif;">Create Post</h1>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label" style="font-family: 'Lora', serif;">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" style="font-family: 'Lora', serif;">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label" style="font-family: 'Lora', serif;">Content:</label>
                    <textarea id="content" name="content" class="form-control" rows="4" style="font-family: 'Lora', serif;"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" style="font-family: 'Lora', serif;">Post</button>
            </form>
        </div>
    </div>
</div>
@endsection

