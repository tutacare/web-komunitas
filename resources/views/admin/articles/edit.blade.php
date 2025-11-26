@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-3">
        <div class="card">
            <div class="card-header">
                <h4>Edit Article</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" class="form-control" value="{{ $article->title }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="6">{{ $article->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Thumbnail <em class="text-muted">600x400</em></label>
                        <input type="file" name="thumbnail" class="form-control">

                        @if ($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="mt-2" width="120">
                        @endif
                    </div>

                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
