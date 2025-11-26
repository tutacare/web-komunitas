@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-3">
        <div class="card">
            <div class="card-header">
                <h4>Create Article</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="6"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Thumbnail <em class="text-muted">600x400</em></label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
