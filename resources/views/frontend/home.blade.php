@extends('layouts.frontend')

@section('content')
    <!-- HERO -->
    <section class="bg-dark text-white text-center py-5"
        style="background: url('{{ $setting && $setting->hero_image
            ? asset('storage/' . $setting->hero_image)
            : 'https://placehold.co/1200x600?text=Hero+Image' }}') center/cover;">

        <div class="container py-5">
            <h1 class="display-3 fw-bold text-shadow">
                {{ $setting->hero_title ?? 'Komunitas Motor Indonesia' }}
            </h1>

            <p class="lead mt-3 text-shadow">
                {{ $setting->hero_description ?? 'Bersatu dalam satu jiwa, satu saudara, satu perjalanan.' }}
            </p>

            <a href="#about" class="btn btn-primary btn-lg mt-4">Kenal Kami</a>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">

                {{-- IMAGE --}}
                <div class="col-md-6 mb-4">
                    @php
                        $aboutImage = !empty($setting?->about_image)
                            ? asset('storage/' . $setting->about_image)
                            : 'https://placehold.co/800x500?text=No+Image';
                    @endphp

                    <img src="{{ $aboutImage }}" class="img-fluid rounded shadow">
                </div>

                {{-- TEXT --}}
                <div class="col-md-6">
                    <h2 class="fw-bold">
                        {{ $setting->about_title ?? 'Tentang Kami' }}
                    </h2>

                    <p class="text-muted">
                        {{ $setting->about_description ?? 'Deskripsi tentang kami belum diatur oleh admin.' }}
                    </p>

                    <a href="/about" class="btn btn-outline-dark">Selengkapnya</a>
                </div>

            </div>
        </div>
    </section>


    <!-- EVENT (DINAMIS) -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Kegiatan Kami</h2>

            <div class="row g-4">
                @forelse($events as $event)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">

                            @php
                                $eventImage = $event->thumbnail
                                    ? asset('storage/' . $event->thumbnail)
                                    : 'https://placehold.co/600x400?text=No+Image';
                            @endphp

                            <img src="{{ $eventImage }}" class="card-img-top" style="height:220px; object-fit:cover;">

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                                <p class="text-muted">{{ Str::limit($event->description, 80) }}</p>
                                <a href="{{ route('event.show', $event->slug) }}" class="btn btn-sm btn-dark">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada event.</p>
                @endforelse
                <div class="mt-4">
                    <a href="{{ route('events.index') }}" class="btn btn-outline-dark">Kegiatan Lainnya</a>
                </div>
            </div>
        </div>
    </section>


    <!-- ARTIKEL -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Artikel Terbaru</h2>

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
                                <p class="text-muted">{{ Str::limit($article->content, 90) }}</p>
                                <a href="{{ route('article.show', $article->slug) }}" class="btn btn-dark btn-sm">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada artikel.</p>
                @endforelse
            </div>

            <div class="mt-4">
                <a href="{{ route('article.index') }}" class="btn btn-outline-dark">
                    Artikel Lainnya
                </a>
            </div>
        </div>
    </section>



    <!-- GALERI -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Galeri</h2>

            <div class="row g-4">

                @forelse($galleries as $gal)
                    {{-- IMAGE --}}
                    @if ($gal->type === 'image')
                        @php
                            $image = $gal->file_path
                                ? asset('storage/' . $gal->file_path)
                                : 'https://placehold.co/600x400?text=No+Image';
                        @endphp
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <img src="{{ $image }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;">
                                <div class="card-body">
                                    <p class="fw-bold">{{ $gal->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- PDF --}}
                    @if ($gal->type === 'pdf')
                        @php
                            // Gunakan thumbnail PDF jika ada, kalau tidak gunakan placeholder
                            $pdfImage = $gal->file_path
                                ? asset('storage/' . $gal->file_path) // Bisa ganti dengan sistem thumbnail PDF jika ada
                                : 'https://cdn-icons-png.flaticon.com/512/337/337946.png';
                        @endphp
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" class="card-img-top"
                                    style="height:220px; object-fit:cover;">
                                <div class="card-body text-center">
                                    <p class="fw-bold">{{ $gal->title }}</p>
                                    <a href="{{ asset('storage/' . $gal->file_path) }}" target="_blank"
                                        class="btn btn-outline-dark btn-sm">Lihat PDF</a>
                                </div>
                            </div>
                        </div>
                    @endif


                    {{-- VIDEO --}}
                    @if ($gal->type === 'video')
                        @php
                            preg_match('/v=([^\&]+)/', $gal->youtube_url, $matches);
                            $youtube_id = $matches[1] ?? null;
                        @endphp
                        <div class="col-md-4">
                            @if ($youtube_id)
                                <div class="ratio ratio-16x9 shadow-sm border-0">
                                    <iframe src="https://www.youtube.com/embed/{{ $youtube_id }}"
                                        allowfullscreen></iframe>
                                </div>
                            @endif
                            <p class="fw-bold mt-2">{{ $gal->title }}</p>
                        </div>
                    @endif

                @empty
                    <p class="text-muted">Belum ada galeri.</p>
                @endforelse


            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© {{ date('Y') }} Komunitas Motor Indonesia. All Rights Reserved. - Versi 0.0.1</p>
    </footer>
@endsection
