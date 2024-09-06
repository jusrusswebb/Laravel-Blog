@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Dashboard Card -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <h1 class="card-title mb-3" style="font-family: 'Lora', serif;">Dashboard</h1>

            @if (session('status'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="mb-4" style="font-family: 'Lora', serif;">You are logged in!</p>

            <!-- View Posts Button -->
            <a href="{{ route('posts.index') }}" class="btn btn-outline-dark mb-3" style="font-family: 'Lora', serif;">View Posts</a>
        </div>
    </div>
</div>
@endsection



