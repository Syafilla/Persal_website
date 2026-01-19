@extends('app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <img src="{{ asset('post/'.$berita->gambar) }}" style="width:100%; height:360px; object-fit:cover; border-radius:8px;">
            <h1 class="mt-3">{{ $berita->judul }}</h1>
            <div class="text-muted mb-3">{{ $berita->kategori }} • {{ $berita->tanggal_publish->format('d M Y') }} • Penulis: {{ $berita->penulis }}</div>

            <div class="mb-4">{!! nl2br(e($berita->isi)) !!}</div>

            {{-- Share --}}
            <div class="mb-4">
                <button class="btn btn-sm btn-outline-secondary" id="btnShare">Share</button>
            </div>

            {{-- Form komentar (public but requires email) --}}
            <div class="card p-3">
                <h5>Komentar</h5>
                <form action="{{ route('berita.komentar', $berita->id) }}" method="POST" id="formKomentar">
                    @csrf
                    @guest
                    <div class="mb-2">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    @endguest

                    <textarea name="komentar" class="form-control mb-2" rows="4" placeholder="Tulis komentar..." required></textarea>

                    <button class="btn btn-primary btn-sm">Kirim Komentar</button>
                </form>

                <div class="mt-3">
                   @foreach($komentar as $k)
                        <div class="mb-3 pb-2 border-bottom">
                            <strong>
                                {{ $k->user_id ? $k->user->name : $k->nama }}
                            </strong>
                            <small class="text-muted">• {{ $k->created_at->diffForHumans() }}</small>

                            <p>{{ $k->komentar }}</p>

                            {{-- BALASAN ADMIN --}}
                            @if($k->balasan)
                            <div class="ms-4 mt-2 p-2 bg-light border rounded">
                                <strong style="color:#0b5ed7">Admin:</strong>
                                <p>{{ $k->balasan }}</p>
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            {{-- Widget lainnya: trending / share / berita lain --}}
            <div class="card p-3 mb-3">
                <h6>Trending</h6>
                @foreach($trending as $t)
                <a href="{{ route('berita.detail', $t->slug) }}" class="d-block text-decoration-none mb-2">
                    <small class="text-muted d-block">{{ $t->kategori }}</small>
                    <div><strong>{{ Str::limit($t->judul, 70) }}</strong></div>
                </a>
                @endforeach
            </div>

            <div class="card p-3">
                <h6>Lainnya</h6>
                @foreach($lainnya as $l)
                <a href="{{ route('berita.detail', $l->slug) }}" class="d-block mb-2">{{ Str::limit($l->judul,60) }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('btnShare')?.addEventListener('click', async () => {
    const shareData = {
        title: "{{ $berita->judul }}",
        text: "{{ Str::limit($berita->isi,120) }}",
        url: window.location.href
    };
    if (navigator.share) {
        navigator.share(shareData).catch(()=>{/*ignore*/});
    } else {
        // fallback: copy url
        navigator.clipboard.writeText(window.location.href);
        alert('Link berita disalin ke clipboard');
    }
});
</script>
@endsection
