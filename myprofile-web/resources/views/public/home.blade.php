@extends('layouts.app')

@section('content')

{{-- HERO --}}

@php
    $heroBg = $profile && $profile->hero_background
        ? media_url($profile->hero_background)
        : null;
@endphp

    <section class="hero home-bg" id="home">

            <div class="container text-center hero-content">
                {{-- FOTO PROFILE --}}
                <img src="{{ $profile && $profile->avatar 
                    ? media_url($profile->avatar) 
                    : media_url($profile->avatar) }}"
                    alt="Profile"
                    class="hero-avatar">

                <h1 class="mt-4">
                    {{ $profile->name ?? 'Halo, Saya Saoki' }}
                </h1>

                <h5 class="fw-light">
                    Backend Developer | Laravel Enthusiast
                </h5>

                <p class="mt-3">
                    Membangun aplikasi web dengan struktur rapi, scalable, dan siap production.
                </p>

                    <a href="/contact" class="btn btn-outline-light">
                        Contact
                    </a>
            </div>

    </section>

    {{-- SKILLS --}}

    <section class="py-5 section-soft" id="skills">
        <div class="container">
            <h3 class="text-center mb-4">Skills</h3>

            @if($skills->isEmpty())
                <p class="text-center text-muted">
                    Skill belum ditambahkan.
                </p>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @foreach($skills as $skill)
                            <div class="mb-3">
                                <strong>{{ $skill->name }}</strong>

                                <div class="progress">
                                    <div
                                        class="progress-bar bg-success skill-bar"
                                        data-level="{{ $skill->level }}"
                                        style="width: 0%;"
                                    >
                                        0%
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>


    {{-- PORTFOLIO --}}

    <section class="py-5 bg-light" id="portfolio">
        <div class="container">
            <h3 class="text-center mb-4">Latest Projects</h3>

            @if($portfolios->isEmpty())
                <p class="text-center text-muted">
                    Portfolio belum tersedia.
                </p>
            @else
                <div class="row">
                    @foreach($portfolios as $portfolio)
                        <div class="col-md-4 mb-4">
                            <div class="card portfolio-card h-100">
                                @if($portfolio->image)
                                    <img
                                        src="{{ media_url($portfolio->image) }}"
                                        class="card-img-top"
                                        alt="{{ $portfolio->title }}"
                                    >
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $portfolio->title }}
                                    </h5>

                                    <p class="card-text text-muted">
                                        {{ Str::limit($portfolio->description, 80) }}
                                    </p>
                                </div>

                                <div class="card-footer bg-white text-center mt-3">
                                    <a href="/portfolio" class="btn btn-sm btn-outline-primary">
                                        Lihat Portofolio
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    {{ $portfolios->links('pagination.arrow-only') }}
                </div>

                <div class="text-center mt-3">
                    <a href="/portfolio" class="btn btn-primary">
                        Lihat Semua Portfolio
                    </a>
                </div>

            @endif
        </div>
    </section>

    {{-- CERTIFICATES --}}
    <section class="container my-5">
        <h2 class="text-center mb-4 certificates-title">Bootcamps & Certificates</h2>

        @if($certificates->isEmpty())
            <p class="text-center text-muted">Sertifikat belum tersedia.</p>
        @else
            <div class="row g-4 justify-content-center">
                @foreach($certificates as $cert)
                    <div class="col-md-4 col-lg-3">
                        <div class="card certificate-card h-100 text-center">

                            {{-- IMAGE PREVIEW --}}
                            <div class="certificate-thumb">
                                <img src="{{ media_url($cert->file) }}"
                                    alt="{{ $cert->title }}"
                                    class="img-fluid">
                            </div>

                            <div class="card-body text-center">
                                <h6 class="fw-semibold mb-3">
                                    {{ $cert->title }}
                                </h6>

                                <a href="{{ media_url($cert->file) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                    Lihat Sertifikat
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $certificates->links('pagination.arrow-only') }}
            </div>

        @endif
    </section>
 
    {{-- ABOUT --}}
    <section class="py-5 bg-light" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="mb-3">About Me</h3>

                            @if(!empty($profile) && !empty($profile->about))
                                <p class="text-muted">
                                    {{ $profile->about }}
                                </p>
                            @else
                                <p class="text-muted">
                                    Profil belum tersedia.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

