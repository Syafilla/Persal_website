@extends('app') 

@section('content')

<div class="container mt-4">
    {{-- SLIDER BERITA TERBARU --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<div class="owl-carousel slider-berita mb-4">

    @foreach($slider_berita as $s)
    <div class="position-relative">

        <a href="{{ route('berita.detail', $s->slug) }}">
            <img src="{{ asset('post/'.$s->gambar) }}" 
                 class="w-100 rounded shadow"
                 style="height:360px; object-fit:cover;">
        </a>

        <div class="position-absolute bottom-0 start-0 w-100 p-3" 
             style="background:rgba(0,0,0,0.6); border-radius:0 0 8px 8px;">

            <h4 class="text-white mb-1">
                {{ $s->judul }}
            </h4>

            <small class="text-light">
                {{ $s->kategori }} • {{ $s->tanggal_publish->format('d M Y') }}
            </small>
        </div>
    </div>
    @endforeach

</div>

    {{-- Berita grid --}}
    <div class="row">
        @foreach($berita as $b)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="{{ asset('post/'.$b->gambar) }}" class="card-img-top" style="height:160px; object-fit:cover;">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted">{{ $b->kategori }} • {{ $b->tanggal_publish->format('d M Y') }}</small>
                    <h6 class="mt-2">{{ Str::limit($b->judul, 80) }}</h6>
                    <p class="mt-auto mb-0"><a href="{{ route('berita.detail', $b->slug) }}" class="btn btn-sm btn-outline-primary mt-3">Baca</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $berita->links() }}
    </div>
</div>

<style>
.hover-lift{ transition: transform .18s ease, box-shadow .18s ease; }
.hover-lift:hover{ transform: translateY(-6px); box-shadow: 0 10px 30px rgba(0,0,0,.12); }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$('#trending-slider').owlCarousel({
    loop:true, margin:10, nav:false, autoplay:true, responsive:{0:{items:1},600:{items:2},1000:{items:3}}
});
</script>
@endsection
