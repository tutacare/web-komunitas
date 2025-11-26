@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ route('article.index') }}" class="btn btn-outline-dark btn-sm">
                    ← Kembali ke Artikel
                </a>
            </div>

            <div class="card shadow-sm border-0">
                @php
                    $articleImage = $article->thumbnail
                        ? asset('storage/' . $article->thumbnail)
                        : 'https://placehold.co/600x400?text=No+Image';
                @endphp

                <img src="{{ $articleImage }}" class="card-img-top" style="height:400px; object-fit:cover;">

                <div class="card-body">
                    <h1 class="fw-bold">{{ $article->title }}</h1>
                    <p class="text-muted mb-3">Diterbitkan pada: {{ $article->created_at->format('d M Y') }}</p>
                    <div class="article-content text-muted">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
