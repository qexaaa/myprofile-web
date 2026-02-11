@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="fw-bold mb-4">{{ $portfolio->title }}</h1>

    <div class="row g-4">

        {{-- Gambar --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                @if($portfolio->image)
                    <img src="{{ media_url($portfolio->image)  }}"
                         class="img-fluid rounded"
                         alt="{{ $portfolio->title }}">
                @else
                    <div class="p-5 text-center text-muted">
                        Tidak ada gambar
                    </div>
                @endif
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="col-md-6">
            <div class="card p-4 h-100">
                <h5 class="fw-semibold mb-3">Deskripsi</h5>

                <p class="text-muted">
                    {{ $portfolio->description ?? 'Belum ada deskripsi.' }}
                </p>

                @if($portfolio->github_link)
                    <a href="{{ $portfolio->github_link }}"
                       target="_blank"
                       class="btn btn-dark mt-3">
                        <i class="bi bi-github me-1"></i>
                        Lihat di GitHub
                    </a>
                @endif

                <a href="{{ route('public.portofolio') }}"
                   class="btn btn-outline-secondary mt-3">
                    ← Kembali
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
