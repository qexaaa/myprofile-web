@extends('layouts.admin')
@section('title','Edit Skill')

@section('content')
<h3 class="mb-4">Edit Skill</h3>

<div class="card admin-card">
    <div class="card-body">
        <form action="{{ route('admin.skills.update',$skill->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Skill</label>
                <input type="text" name="name" value="{{ $skill->name }}" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label">Level (%)</label>
                <input type="number" name="level" value="{{ $skill->level }}" class="form-control">
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
