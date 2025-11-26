@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Gallery</h4>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Add New</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>
                                    @if ($gallery->type === 'image')
                                        <img src="{{ asset('storage/' . $gallery->file_path) }}" width="80">
                                    @elseif ($gallery->type === 'pdf')
                                        <i class="bi bi-file-earmark-pdf text-danger fs-1"></i>
                                    @else
                                        <iframe width="120" height="70"
                                            src="https://www.youtube.com/embed/{{ Str::after($gallery->youtube_url, 'v=') }}">
                                        </iframe>
                                    @endif
                                </td>

                                <td>{{ $gallery->title }}</td>
                                <td>{{ strtoupper($gallery->type) }}</td>

                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $galleries->links() }}
            </div>
        </div>
    </div>
@endsection
