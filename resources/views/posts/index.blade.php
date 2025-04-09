@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Posts</h2>
        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New Post</a>
        @endauth
    </div>

    @forelse($posts as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text text-muted">{{ $post->content }}</p>

                @auth
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-warning me-2">Edit</a>

                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="confirmDelete(event, this.form)">Delete</button>
                    </form>
                @endauth
            </div>
        </div>
    @empty
        <p class="text-muted">No posts found.</p>
    @endforelse
@endsection
