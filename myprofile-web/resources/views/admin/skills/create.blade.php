@extends('layouts.admin')
@section('title','Tambah Skill')

@section('content')
<h3 class="mb-4">Tambah Skill</h3>

<div class="card admin-card">
    <div class="card-body">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Skill</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Level (%)</label>
                <input type="number" name="level" class="form-control" min="0" max="100" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
