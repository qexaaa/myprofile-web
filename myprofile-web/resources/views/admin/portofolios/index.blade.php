@extends('layouts.admin')

@section('title', 'Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Portfolio</h3>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah Portfolio
    </a>
</div>

<div class="card admin-card">
    <div class="card-body">
        @if($portfolios->isEmpty())
            <div class="empty-state">
                <i class="bi bi-folder-x"></i>
                <p>Belum ada portfolio.</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover align-middle admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>GitHub</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->title }}</td>
                       <td>
                            @if($portfolio->image)
                                <div class="portfolio-thumb-card"
                                    data-bs-toggle="modal"
                                    data-bs-target="#previewImageModal"
                                    data-image="{{ media_url($portfolio->image) }}"
                                    data-title="{{ $portfolio->title }}">
                                    
                                    <img src="{{ media_url($portfolio->image) }}"
                                        alt="{{ $portfolio->title }}">
                                </div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>
                            @if($portfolio->github_link)
                                <a href="{{ $portfolio->github_link }}" target="_blank">
                                    <i class="bi bi-github fs-5"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}"
                               class="btn-icon btn-edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}"
                                  method="POST"
                                  id="delete-form-{{ $portfolio->id }}"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-icon btn-delete"
                                    data-id="{{ $portfolio->id }}">
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

<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="previewImageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark border-0 rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title text-light" id="previewImageTitle"></h5>
                <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="previewImage"
                     src=""
                     class="img-fluid rounded-3 shadow">
            </div>
        </div>
    </div>
</div>


@endsection
