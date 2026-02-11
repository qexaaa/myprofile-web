@extends('layouts.admin')

@section('title', 'Tambah Sertifikat')

@section('content')
<h3 class="mb-3">Tambah Sertifikat</h3>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Sertifikat</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">File (PDF / Image)</label>
                <input type="file" name="file" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
