@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Events</h4>
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Create New</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>
                                    @if ($event->thumbnail)
                                        <img src="{{ asset('storage/' . $event->thumbnail) }}" width="70"
                                            class="rounded">
                                    @endif
                                </td>
                                <td>{{ $event->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this event?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
