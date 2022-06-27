<div class="col-md-6">
    <hr />
    <p class="h3 text-dark text-center my-0 py-0">PENGUMUMAN TERBARU</p>
    <div id="carouselExampleControls" class="carousel slide my-0 py-0" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($notices as $item)
            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                <div class="carousel-caption text-left">
                    <p class="h6 bg-warning rounded-lg p-1"><i class="bi bi-calendar3"></i> {{ $item->created_at->format('l, j F Y h:i:s A') }}</p>
                    <h3>{{ $item->title }}</h3>
                    <p class="h5">{{ $item->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
            data-slide="prev">
            <span class="text-dark">Prev</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
            data-slide="next">
            <span class="text-dark">Next</span>
        </a>
    </div>
    <hr />
</div>