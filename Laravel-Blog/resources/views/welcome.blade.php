@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Blog</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">View Posts</a>
    </div>
@endsection
