<div id="home-portfolio-wrapper">

    {{-- GRID CARDS --}}
   <div class="row">
        @foreach($portfolios as $portfolio)
            <div class="col-md-4 mb-4">
                <div class="card portfolio-card h-100">
                    @if($portfolio->image)
                        <img src="{{ media_url($portfolio->image) }}"
                             class="card-img-top"
                             alt="{{ $portfolio->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $portfolio->title }}</h5>
                        <p class="text-muted">
                            {{ Str::limit($portfolio->description, 80) }}
                        </p>
                    </div>

                    <div class="card-footer text-center bg-white">
                        <a href="/portfolio" class="btn btn-sm btn-outline-primary">
                            Lihat Portofolio
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- COMPONENT --}}
    <x-home-pagination
        :paginator="$portfolios"
        target="portfolio"
    />

</div>
