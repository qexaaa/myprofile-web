@extends('layouts.app')

@section('content')
<section class="contact-page">
    <div class="contact-card text-center">

        <h2 class="contact-title">Contact</h2>
        <p class="contact-subtitle mb-4">
            Jangan ragu untuk menghubungi saya
        </p>

        @if($profile)

            {{-- EMAIL --}}
            <div class="contact-item email">
                <i class="bi bi-envelope"></i>
                <a href="mailto:{{ $profile->email }}">
                    {{ $profile->email }}
                </a>
            </div>

            {{-- LINKEDIN --}}
            @if($profile->linkedin)
                <div class="contact-item linkedin">
                   <i class="bi bi-linkedin"></i>
                    <a href="{{ $profile->linkedin }}"
                        target="_blank"
                        class="contact-link linkedin">
                            @MuhammadSaokiRamada
                        </a>
                </div>
            @endif

            {{-- GITHUB --}}
           @if($profile->github)
                @php
                    // ambil username dari URL github
                    $githubUsername = Str::after($profile->github, 'github.com/');
                @endphp

                <div class="contact-item github">
                    <i class="bi bi-github"></i>
                    <a href="{{ $profile->github }}" target="_blank" rel="noopener">
                        {{ '@' . $githubUsername }}
                    </a>
                </div>
            @endif

            {{-- INSTAGRAM --}}
                @if($profile->instagram)
                    @php
                        // ambil username dari URL
                        $igUsername = '@' . ltrim(
                            parse_url($profile->instagram, PHP_URL_PATH),
                            '/'
                        );
                    @endphp

                    <div class="contact-item instagram">
                        <i class="bi bi-instagram"></i>
                        <a href="{{ $profile->instagram }}"
                        target="_blank"
                        rel="noopener">
                            {{ $igUsername }}
                        </a>
                    </div>
                @endif
                
        @else
            <p class="text-muted">Informasi kontak belum tersedia.</p>
        @endif

        {{-- BACK BUTTON --}}
        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="back-home">
                ← Kembali ke Beranda
            </a>
        </div>
        
    </div>
</section>
@endsection
