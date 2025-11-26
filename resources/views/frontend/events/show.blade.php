@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow-sm border-0 mb-4">
                        @php
                            $eventImage = $event->thumbnail
                                ? asset('storage/' . $event->thumbnail)
                                : 'https://placehold.co/600x400?text=No+Image';
                        @endphp
                        <img src="{{ $eventImage }}" class="card-img-top" style="height:350px; object-fit:cover;">

                        <div class="card-body">
                            <h2 class="fw-bold">{{ $event->title }}</h2>
                            <p class="text-muted mb-1"><i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d M Y') }}</p>
                            <p class="text-muted mb-1"><i class="bi bi-geo-alt"></i> {{ $event->location }}</p>

                            <hr>

                            <p class="text-justify">{{ $event->description }}</p>

                            <a href="{{ route('events.index') }}" class="btn btn-outline-dark mt-3">Kembali ke Kegiatan
                                Lainnya</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
