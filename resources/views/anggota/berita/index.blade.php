@extends('anggota')

@section('layout2')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<div class="container mt-4">
    <div class="mb-4">
        <div class="owl-carousel owl-theme" id="trending-slider">
            @foreach($trending as $t)
            <div class="item">
                <a href="{{ route('anggota.berita.detail', $t->slug) }}" class="text-decoration-none">
                    <div style="position:relative;">
                        <img src="{{ asset('post/'.$t->gambar) }}" style="width:100%; height:220px; object-fit:cover; border-radius:8px;">
                        <div style="position:absolute; left:12px; bottom:12px; color:#fff; background:rgba(0,0,0,.45); padding:8px 10px; border-radius:6px;">
                            <h5 style="margin:0; font-size:16px;">{{ Str::limit($t->judul, 70) }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        @foreach($berita as $b)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="{{ asset('post/'.$b->gambar) }}" class="card-img-top" style="height:160px; object-fit:cover;">
                <div class="card-body d-flex flex-column">
                    <small class="text-muted">{{ $b->kategori }} • {{ $b->tanggal_publish->format('d M Y') }}</small>
                    <h6 class="mt-2">{{ Str::limit($b->judul, 80) }}</h6>
                    <p class="mt-auto mb-0"><a href="{{ route('anggota.berita.detail', $b->slug) }}" class="btn btn-sm btn-outline-primary mt-3">Baca</a></p>
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
