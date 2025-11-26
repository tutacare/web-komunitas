@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Event</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Event Date</label>
                        <input type="date" name="event_date" class="form-control" value="{{ $event->event_date }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Thumbnail <em class="text-muted">600x400</em></label><br>

                        @if ($event->thumbnail)
                            <img src="{{ asset('storage/' . $event->thumbnail) }}" width="120" class="mb-2 rounded">
                        @endif

                        <input type="file" name="thumbnail" class="form-control mt-2">
                    </div>

                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
