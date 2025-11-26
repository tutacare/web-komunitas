@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Gallery Item</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" value="{{ $gallery->title }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Type</label>
                        <select name="type" id="type" onchange="toggleEditInputs()" class="form-control">
                            <option value="image" {{ $gallery->type == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="pdf" {{ $gallery->type == 'pdf' ? 'selected' : '' }}>PDF</option>
                            <option value="video" {{ $gallery->type == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    {{-- PREVIEW --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block">Preview</label>

                        @if ($gallery->type == 'image')
                            <img src="{{ asset('storage/' . $gallery->file) }}" class="rounded shadow" width="200">
                        @elseif($gallery->type == 'pdf')
                            <a href="{{ asset('storage/' . $gallery->file) }}" class="btn btn-info" target="_blank">
                                Open PDF
                            </a>
                        @else
                            <iframe class="rounded" width="350" height="200"
                                src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($gallery->file, 'v=') }}">
                            </iframe>
                        @endif
                    </div>

                    {{-- INPUT FILE --}}
                    <div id="fileInput" style="{{ $gallery->type == 'video' ? 'display:none' : '' }}" class="mb-3">
                        <label class="form-label fw-bold">Replace File (optional)</label>
                        <input type="file" name="file" class="form-control">
                    </div>

                    {{-- YOUTUBE INPUT --}}
                    <div id="youtubeInput" style="{{ $gallery->type == 'video' ? '' : 'display:none' }}" class="mb-3">
                        <label class="form-label fw-bold">YouTube URL</label>
                        <input type="text" name="youtube_url"
                            value="{{ $gallery->type == 'video' ? $gallery->file : '' }}" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">Update</button>

                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleEditInputs() {
            const type = document.getElementById("type").value;

            document.getElementById("fileInput").style.display =
                (type === "image" || type === "pdf") ? "block" : "none";

            document.getElementById("youtubeInput").style.display =
                (type === "video") ? "block" : "none";
        }
    </script>
@endsection
