@extends('layouts.app')

@section('content')
    <div class="mt-5 pt-3">
        <div class="card">
            <div class="card-header">
                <h4>Website Settings</h4>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#hero">Hero Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#about">About Section</a>
                    </li>
                </ul>

                <div class="tab-content mt-3">

                    {{-- HERO SECTION --}}
                    <div class="tab-pane fade show active" id="hero">
                        <form action="{{ route('admin.settings.update.hero') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Hero Title</label>
                                <input type="text" name="hero_title" class="form-control"
                                    value="{{ $setting->hero_title ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Description</label>
                                <textarea name="hero_description" class="form-control" required>{{ $setting->hero_description ?? '' }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Image (1200x600)</label>
                                <input type="file" name="hero_image" class="form-control">
                                @if (!empty($setting->hero_image))
                                    <img src="{{ asset('storage/' . $setting->hero_image) }}" class="img-fluid mt-2"
                                        style="max-width: 300px;">
                                @endif
                            </div>

                            <button class="btn btn-primary">Save Hero</button>
                        </form>
                    </div>

                    {{-- ABOUT SECTION --}}
                    <div class="tab-pane fade" id="about">

                        <form action="{{ route('admin.settings.update.about') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">About Title</label>
                                <input type="text" name="about_title" class="form-control"
                                    value="{{ $setting->about_title ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About Description</label>
                                <textarea name="about_description" class="form-control" required>{{ $setting->about_description ?? '' }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">About Image <em class="text-muted">800x500</em></label>
                                <input type="file" name="about_image" class="form-control">
                                @if (!empty($setting->about_image))
                                    <img src="{{ asset('storage/' . $setting->about_image) }}" class="img-fluid mt-2"
                                        style="max-width: 300px;">
                                @endif
                            </div>

                            <button class="btn btn-primary">Save About</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
