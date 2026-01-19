@extends('anggota')

@section('layout2')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-8">

            <h1 class="fw-bold">{{ $berita->judul }}</h1>
            <small class="text-muted">{{ $berita->kategori }} | {{ $berita->tanggal_publish }}</small>

            <img src="{{ asset('storage/'.$berita->gambar) }}" class="img-fluid rounded my-3 w-100">

            <div style="font-size:18px;line-height:32px;">{!! nl2br($berita->isi) !!}</div>

            <hr>
            <h4>Baca Juga</h4>
            <div class="row">
                @foreach($lainnya as $l)
                <div class="col-md-6 mb-3">
                    <a href="{{ route('berita.detail',$l->slug) }}">
                        <div class="card">
                            <img src="{{ asset('storage/'.$l->gambar) }}" height="120" style="object-fit:cover;">
                            <div class="p-2">{{ $l->judul }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <hr><h3>Komentar</h3>

            @foreach($komentar as $k)
            <div id="comment-{{ $k->id }}" class="border p-2 rounded mb-2">
                <b>{{ $k->nama }}</b> <small>{{ $k->created_at->diffForHumans() }}</small>
                <p>{{ $k->komentar }}</p>
            </div>
            @endforeach


            <h4 class="mt-4">Tinggalkan Komentar</h4>
            <form action="{{ route('berita.komentar',$berita->id) }}" method="POST">
                @csrf

                @guest
                <input name="nama" class="form-control mb-2" placeholder="Nama" required>
                <input name="email" class="form-control mb-2" placeholder="Email" required type="email">
                @endguest

                <textarea name="komentar" class="form-control mb-2" rows="3" placeholder="Komentar..." required></textarea>
                <button class="btn btn-primary w-100">Kirim</button>
            </form>

        </div>

        <div class="col-md-4">
            <h4 class="mb-3">Trending</h4>

            @php
            $trending = \App\Models\Berita::orderByDesc('views')->limit(5)->get();
            @endphp

            @foreach($trending as $t)
            <a href="{{ route('berita.detail',$t->slug) }}">
            <div class="d-flex mb-2 border-bottom pb-2">
                <img src="{{ asset('storage/'.$t->gambar) }}" width="80" height="60" style="object-fit:cover;">
                <p class="ms-2">{{ $t->judul }}</p>
            </div>
            </a>
            @endforeach

        </div>
    </div>
</div>
@endsection
