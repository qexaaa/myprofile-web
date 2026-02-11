@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-primary fs-2">
                    <i class="bi bi-collection"></i>
                </div>
                <div>
                    <small class="text-muted">Portfolio</small>
                    <h4 class="mb-0">{{ $portfolioCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-success fs-2">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <div>
                    <small class="text-muted">Skills</small>
                    <h4 class="mb-0">{{ $skillCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 text-warning fs-2">
                    <i class="bi bi-award"></i>
                </div>
                <div>
                    <small class="text-muted">Certificates</small>
                    <h4 class="mb-0">{{ $certificateCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
