@extends('layouts.app')

@section('content')
<div class="container py-5 portfolio-page">
    <h1 class="fw-bold mb-4">Semua Portfolio</h1>

    <div class="row g-4">
        @foreach ($portfolios as $portfolio)
            <div class="col-md-4">
                <div class="card portfolio-card h-100">

                    @if($portfolio->image)
                        <img src="{{ media_url($portfolio->image) }}"
                             class="card-img-top"
                             alt="{{ $portfolio->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $portfolio->title }}</h5>
                        <p class="text-muted small">
                            {{ Str::limit($portfolio->description, 100) }}
                        </p>

                        <div class="text-center mt-3">
                            <a href="{{ route('public.portofolio.detail', $portfolio->id) }}"
                               class="btn btn-primary btn-sm">
                                Lihat Portofolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $portfolios->links('pagination::bootstrap-5') }}
    </div>

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
