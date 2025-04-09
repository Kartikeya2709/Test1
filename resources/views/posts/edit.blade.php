@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">{{ isset($post) ? 'Edit' : 'Create' }} Post</h3>

            <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}">
                @csrf
                @if(isset($post)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="4" required>{{ old('content', $post->content ?? '') }}</textarea>
                    @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update' : 'Create' }}
                </button>
            </form>
        </div>
    </div>
@endsection
