@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Gallery</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type" id="typeSelect" class="form-control" required>
                            <option value="image">Image</option>
                            <option value="pdf">PDF</option>
                            <option value="video">Video (YouTube)</option>
                        </select>
                    </div>

                    <div class="mb-3" id="fileInputWrapper">
                        <label class="form-label">Upload Image/PDF</label>
                        <input type="file" name="file_path" class="form-control">
                    </div>

                    <div class="mb-3 d-none" id="youtubeWrapper">
                        <label class="form-label">YouTube URL</label>
                        <input type="text" name="youtube_url" class="form-control"
                            placeholder="https://youtube.com/watch?v=xxxx">
                    </div>

                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('typeSelect').addEventListener('change', function() {
            const fileDiv = document.getElementById('fileInputWrapper');
            const ytDiv = document.getElementById('youtubeWrapper');

            if (this.value === 'video') {
                fileDiv.classList.add('d-none');
                ytDiv.classList.remove('d-none');
            } else {
                fileDiv.classList.remove('d-none');
                ytDiv.classList.add('d-none');
            }
        });
    </script>
@endsection
