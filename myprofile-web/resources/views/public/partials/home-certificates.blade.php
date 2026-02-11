<div id="home-certificate-wrapper">

    {{-- GRID CARDS --}}
    <div class="row g-4 justify-content-center">
        @foreach($certificates as $cert)
            <div class="col-md-4 col-lg-3">
                <div class="card certificate-card h-100 text-center">
                    <div class="certificate-thumb">
                        <img src="{{ media_url($cert->file) }}"
                             alt="{{ $cert->title }}"
                             class="img-fluid">
                    </div>

                    <div class="card-body">
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

    {{-- COMPONENT --}}
    <x-home-pagination
        :paginator="$certificates"
        target="certificate"
    />

</div>
