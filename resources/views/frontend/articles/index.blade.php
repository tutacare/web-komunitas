@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Semua Artikel</h2>

            <div class="row g-4">
                @forelse($articles as $article)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            @php
                                $articleImage = $article->thumbnail
                                    ? asset('storage/' . $article->thumbnail)
                                    : 'https://placehold.co/600x400?text=No+Image';
                            @endphp

                            <img src="{{ $articleImage }}" class="card-img-top" style="height:220px; object-fit:cover;">

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                                <p class="text-muted">{{ Str::limit($article->content, 100) }}</p>
                                <a href="{{ route('article.show', $article->slug) }}" class="btn btn-dark btn-sm">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">Belum ada artikel.</p>
                @endforelse
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
@endsection
