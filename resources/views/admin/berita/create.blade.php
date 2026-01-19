@extends('admin')
@section('layout1')
<div class="card p-4">
    <h4>✍ Tambah Berita</h4><hr>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Judul Berita</label>
        <input type="text" name="judul" class="form-control mb-2">

        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control mb-2">

        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control mb-2">

        <label>Isi Berita</label>
        <textarea name="isi" rows="7" class="form-control mb-3"></textarea>

        <button class="btn btn-primary">Publish</button>
    </form>
</div>
@endsection
