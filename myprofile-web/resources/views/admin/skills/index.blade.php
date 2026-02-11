@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Skills</h3>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Skill
    </a>
</div>

<div class="card admin-card">
    <div class="card-body">
        @if($skills->isEmpty())
            <div class="empty-state">
                <i class="bi bi-bar-chart"></i>
                <p>Belum ada skill.</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle admin-table">
                <thead>
                    <tr>
                        <th>Nama Skill</th>
                        <th>Level</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->level }}</td>
                        <td>
                            <a href="{{ route('admin.skills.edit', $skill->id) }}"
                               class="btn-icon btn-edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.skills.destroy', $skill->id) }}"
                                  method="POST"
                                  id="delete-form-{{ $skill->id }}"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-icon btn-delete"
                                    data-id="{{ $skill->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
