@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Semua Kegiatan</h2>

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
                                <p class="text-muted">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('event.show', $event->slug) }}" class="btn btn-sm btn-dark">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada event.</p>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </section>
@endsection
