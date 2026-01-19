@extends('admin')

@section('layout1')
<main class="flex-grow-1">
<div class="card shadow p-3">
    <div class="d-flex justify-content-between mb-3">
        <h4>📄 Daftar Berita</h4>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">+ Tambah Berita</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Gambar</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($berita as $b)
            <tr>
                <td><img src="{{ asset('post/' . $b->gambar) }}" alt="" width="300"></td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->kategori }}</td>
                <td>{{ $b->tanggal_publish }}</td>
                <td>
                    <a href="{{ route('admin.berita.edit',$b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.berita.delete',$b->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus berita ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $berita->links() }}
</div>
</main>
@endsection
