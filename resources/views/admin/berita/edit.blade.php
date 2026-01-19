@extends('admin')

@section('layout1')

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Edit Berita</h4>
    </div>

    <div class="pd-20">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" class="form-control" name="judul" value="{{ $berita->judul }}" required>
            </div>

            <div class="form-group mt-2">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ $berita->kategori }}" required>
            </div>

            <div class="form-group mt-2">
                <label>Isi Berita</label>
                <textarea name="isi" id="summernote" class="form-control">{{ $berita->isi }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label>Gambar Saat Ini</label> <br>
                <img src="{{ asset('post/'.$berita->gambar) }}" width="180" class="mb-3 rounded shadow">
                <input type="file" class="form-control mt-2" name="gambar">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
            </div>

            <button class="btn btn-primary mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>



<div class="card-box mb-30 mt-4">
    <div class="pd-20">
        <h4 class="text-blue h4">Komentar pada Berita Ini</h4>
    </div>

    <div class="pd-20">
        @if($komentar->count() == 0)
            <p class="text-muted">Belum ada komentar.</p>
        @endif

        @foreach($komentar as $k)
            <div id="comment-{{ $k->id }}" class="border rounded p-3 mb-3 bg-light">

                <strong>{{ $k->user_id ? $k->user->name : $k->nama }}</strong>
                <small class="text-muted">
                    • {{ $k->created_at->diffForHumans() }}
                </small>

                <p class="mt-2">{{ $k->komentar }}</p>

                @if($k->balasan)
                    <div class="ms-4 mt-2 p-2 bg-white border border-primary rounded">
                        <strong>Admin:</strong>
                        <p>{{ $k->balasan }}</p>
                    </div>
                @else
                    <form action="{{ route('admin.komen.balas', $k->id) }}" method="POST" class="ms-4 mt-2">
                        @csrf
                        <textarea name="balasan" class="form-control" rows="2" placeholder="Balas komentar ini..." required></textarea>
                        <button class="btn btn-sm btn-primary mt-2">Balas</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $('#summernote').summernote({
        height: 250
    });
</script>
@if(session('scrollTo'))
<script>
    setTimeout(() => {
        const el = document.getElementById("comment-{{ session('scrollTo') }}");
        if (el) {
            el.scrollIntoView({behavior:'smooth', block:'center'});
            el.style.background = '#fff3cd';
        }
    }, 500);
</script>
@endif


@endsection
