@extends('layouts.admin')

@section('title', 'Edit Sertifikat')

@section('content')

{{-- HEADING + BREADCRUMB --}}
<div class="mb-3">
    <h3 class="mb-1">Edit Sertifikat</h3>
    <small class="text-muted">
        Admin / Certificates / Edit
    </small>
</div>

<div class="card admin-card">
    <div class="card-body">
        <form action="{{ route('admin.certificates.update', $certificate->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-3">
                <label class="form-label">Judul Sertifikat</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $certificate->title) }}"
                       required>
            </div>

            {{-- FILE --}}
            <div class="mb-3">
                <label class="form-label">File (PDF / Image)</label>
                <input type="file"
                       name="file"
                       class="form-control">

                @if($certificate->file)
                    <small class="d-block mt-2">
                        File saat ini :
                        <a href="{{ media_url($certificate->file) }}"
                           target="_blank"
                           class="text-decoration-none">
                            Lihat
                        </a>
                    </small>
                @endif
            </div>

            {{-- PREVIEW IMAGE --}}
            @if($certificate->file && Str::endsWith($certificate->file, ['.jpg', '.jpeg', '.png']))
                <div class="mb-4">
                    <label class="form-label">Preview Sertifikat</label>
                    <div class="portfolio-thumb-card"
                         style="width: 100%; height: auto; max-height: 300px;">
                        <img src="{{ media_url($certificate->file) }}"
                             alt="{{ $certificate->title }}"
                             style="object-fit: contain;">
                    </div>
                </div>
            @endif

            {{-- ACTION --}}
            <div class="d-flex gap-2">
                <button class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('admin.certificates.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
