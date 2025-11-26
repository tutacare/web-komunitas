@extends('layouts.frontend')

@section('content')
    <!-- HERO ABOUT -->
    <section class="py-5 bg-light text-center">
        <div class="container">
            <h1 class="fw-bold mb-4">{{ $about->about_title ?? 'Tentang Kami' }}</h1>
            <p class="lead text-muted mb-4">{{ $about->about_description ?? 'Deskripsi tentang komunitas belum tersedia.' }}
            </p>

            @if (!empty($about->about_image))
                <img src="{{ asset('storage/' . $about->about_image) }}" class="img-fluid rounded shadow" alt="About Us">
            @else
                <img src="https://placehold.co/800x400" class="img-fluid rounded shadow" alt="Placeholder About">
            @endif
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Lebih Banyak Tentang Kami</h2>
            <p class="text-muted text-center">
                Kami adalah komunitas motor yang menjunjung tinggi persaudaraan, loyalitas, dan kebersamaan.
                Berkumpul, touring, dan berbagi dalam satu keluarga besar pecinta roda dua.
            </p>
        </div>
    </section>
@endsection
