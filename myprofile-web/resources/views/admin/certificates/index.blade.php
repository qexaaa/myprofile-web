@extends('layouts.admin')

@section('title', 'Certificates')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Sertifikat</h3>
    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Sertifikat
    </a>
</div>

<div class="card admin-card p-0">
    <div class="admin-table-wrapper">
        @if($certificates->isEmpty())
            <div class="empty-state">
                <i class="bi bi-award"></i>
                <p>Belum ada sertifikat</p>
            </div>
        @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>File</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certificates as $cert)
                <tr>
                    <td>{{ $cert->title }}</td>
                    <td>
                        <a href="{{  media_url($cert->file) }}"
                           target="_blank"
                           class="btn btn-sm btn-outline-primary">
                            Lihat Sertifikat
                        </a>
                    </td>
                    <td class="text-end">
                        {{-- EDIT --}}
                        <a href="{{ route('admin.certificates.edit', $cert->id) }}"
                           class="btn-icon btn-edit"
                           title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.certificates.destroy', $cert->id) }}"
                              method="POST"
                              id="delete-form-{{ $cert->id }}"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="btn-icon btn-delete"
                                    data-id="{{ $cert->id }}"
                                    title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
