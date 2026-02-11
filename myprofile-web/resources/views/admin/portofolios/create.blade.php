@extends('layouts.admin')

@section('title', 'Tambah Portfolio')

@section('content')
<div class="mb-3">
    <h3>Tambah Portfolio</h3>
</div>

<div class="card admin-card">
    <div class="card-body">
        <form action="{{ route('admin.portfolios.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       required>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          rows="4"
                          class="form-control"
                          required></textarea>
            </div>

            {{-- GitHub --}}
            <div class="mb-3">
                <label class="form-label">GitHub Link</label>
                <input type="url"
                       name="github_link"
                       class="form-control">
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            {{-- ACTION --}}
            <div class="d-flex gap-2">
                <button class="btn btn-primary">
                    Simpan
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
