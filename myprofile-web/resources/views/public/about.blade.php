@extends('layouts.app')

@section('content')
<h2>About Me</h2>

@if($profile)
    <p>{{ $profile->about }}</p>

    <p>
        Email: {{ $profile->email }} <br>
        <a href="{{ $profile->linkedin }}" target="_blank">LinkedIn</a> |
        <a href="{{ $profile->github }}" target="_blank">GitHub</a>
    </p>
@else
    <p>Profil belum tersedia.</p>
@endif
@endsection
