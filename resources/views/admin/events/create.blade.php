@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-4">
        <div class="card">
            <div class="card-header">
                <h4>Create Event</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Event Date</label>
                        <input type="date" name="event_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Thumbnail <em class="text-muted">600x400</em></label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
