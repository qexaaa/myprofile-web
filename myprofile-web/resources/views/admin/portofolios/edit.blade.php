@extends('layouts.admin')

@section('title', 'Edit Portfolio')

@section('content')
<div class="mb-3">
    <h3>Edit Portfolio</h3>
</div>

<div class="card admin-card">
    <div class="card-body">
        <form action="{{ route('admin.portfolios.update', $portfolio->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $portfolio->title) }}"
                       required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          class="form-control"
                          rows="4"
                          required>{{ old('description', $portfolio->description) }}</textarea>
            </div>

            {{-- GitHub --}}
            <div class="mb-3">
                <label class="form-label">GitHub Link</label>
                <input type="url"
                       name="github_link"
                       class="form-control"
                       value="{{ old('github_link', $portfolio->github_link) }}">
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label class="form-label">Gambar Baru (Opsional)</label>
                <input type="file"
                       name="image"
                       class="form-control">

                @if($portfolio->image)
                    <small class="d-block mt-2">
                        Gambar saat ini :
                        <a href="{{ media_url($portfolio->image) }}"
                           target="_blank"
                           class="text-decoration-none">
                            Lihat
                        </a>
                    </small>
                @endif
            </div>

            {{-- ACTION --}}
            <div class="d-flex gap-2">
                <button class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('admin.portfolios.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
