@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="bg-dark text-white text-center py-5"
        style="background: url('https://images.unsplash.com/photo-1558979159-2b18a4070a87?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="container py-5">
            <h1 class="display-3 fw-bold text-shadow">Komunitas Motor Indonesia</h1>
            <p class="lead mt-3 text-shadow">Bersatu dalam satu jiwa, satu brotherhood, satu perjalanan.</p>
            <a href="#about" class="btn btn-primary btn-lg mt-4">Kenal Kami</a>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1471295253337-3ceaaedca402?auto=format&fit=crop&w=800&q=80"
                        class="img-fluid rounded shadow" alt="">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Siapa Kami?</h2>
                    <p class="text-muted">
                        Komunitas motor yang menjunjung tinggi persaudaraan, loyalitas, dan kebersamaan.
                        Kami percaya bahwa riding bukan hanya perjalanan, tapi pengalaman hidup yang mempersatukan.
                    </p>
                    <a href="#" class="btn btn-outline-dark">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Kegiatan -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Kegiatan Kami</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sunmori</h5>
                            <p class="text-muted">Perjalanan pagi bersama menjelajahi kota dan pegunungan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&w=800&q=80"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Event Sosial</h5>
                            <p class="text-muted">Kami aktif dalam kegiatan sosial, donasi, dan bakti masyarakat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=800&q=80"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Touring Nasional</h5>
                            <p class="text-muted">Perjalanan jarak jauh lintas provinsi untuk mempererat brotherhood.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© {{ date('Y') }} Komunitas Motor Indonesia. All Rights Reserved.</p>
    </footer>
@endsection
