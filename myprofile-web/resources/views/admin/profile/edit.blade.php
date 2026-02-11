@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Profile</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $profile->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label>About</label>
            <textarea name="about" class="form-control" rows="4">{{ old('about', $profile->about ?? '') }}</textarea>
        </div>

       <div class="mb-3">
            <label>Instagram</label>
            <input type="text" name="instagram" class="form-control"
                placeholder="https://www.instagram.com/username"
                value="{{ old('instagram', $profile->instagram ?? '') }}">

            @if($profile?->instagram)
                <small class="text-muted">
                    Preview:
                    <a href="{{ $profile->instagram }}"
                    target="_blank"
                    rel="noopener">
                        {{ '@' . ltrim(parse_url($profile->instagram, PHP_URL_PATH), '/') }}
                    </a>
                </small>
            @endif
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $profile->email ?? '') }}">
        </div>

        <div class="mb-3">
            <label>LinkedIn</label>
            <input type="text" name="linkedin" class="form-control"
                   value="{{ old('linkedin', $profile->linkedin ?? '') }}">
        </div>

        <div class="mb-3">
            <label>GitHub</label>
            <input type="text" name="github" class="form-control"
                   value="{{ old('github', $profile->github ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Avatar</label>
            <input type="file" name="avatar" class="form-control">
            @if($profile?->avatar)
                <img src="{{ media_url($profile->avatar) }}" class="mt-2 rounded" style="height:80px">
            @endif
        </div>

        <div class="mb-3">
            <label>Hero Background</label>
            <input type="file" name="hero_background" class="form-control">
            @if($profile?->hero_background)
                <img src="{{ media_url($profile->hero_background) }}" class="mt-2 rounded" style="height:80px">
            @endif
        </div>

        <button class="btn btn-primary">
            Simpan Profile
        </button>
    </form>
</div>
@endsection
