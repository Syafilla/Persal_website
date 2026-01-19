@extends('admin')
@section('layout1')
<main>
<div class="card-box p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="" method="GET" class="d-flex gap-2 align-items-center">
            <label class="fw-bold mb-0">List Anggota</label>
            <select name="tahun" onchange="this.form.submit()" class="form-select">
                <option value="ALL" {{ $tahunFilter=='ALL'?'selected':'' }}>ALL</option>
                @foreach($tahunList as $t)
                    <option value="{{ $t->tahun_masuk }}" {{ $tahunFilter==$t->tahun_masuk?'selected':'' }}>
                        {{ $t->tahun_masuk }}
                    </option>
                @endforeach
            </select>
        </form>
        <a href="{{ route('users.export') }}" class="btn btn-success">
            Download Excel
        </a>
    </div>
</div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Foto</th>
                    <th>NI.A</th>
                    <th>Username</th>
                    <th>Tetala</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Tahun Masuk</th>
                    <th class="datatable-nosort">Atur</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->foto?asset('foto_anggota/'.$user->foto):'https://via.placeholder.com/50'}}" 
                                width="50" class="rounded">
                        </td>
                        <td>{{ $user->nia }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->tempat_lahir }},{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d M Y') }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->pendidikan }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->tahun_masuk }}</td>
                    <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" 
                                href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <button 
                                            class="dropdown-item btnDetail"
                                            data-id="{{ $user->id }}"
                                            data-nia="{{ $user->nia }}"
                                            data-username="{{ $user->name }}"
                                            data-alamat="{{ $user->alamat }}"
                                            data-tempat="{{ $user->tempat_lahir }}"
                                            data-tanggal="{{ $user->tanggal_lahir }}"
                                            data-ayah="{{ $user->nama_ayah }}"
                                            data-ibu="{{ $user->nama_ibu }}"
                                            data-jabatan="{{ $user->jabatan }}"
                                            data-tahun="{{ $user->tahun_masuk }}"
                                            data-pendidikan="{{ $user->pendidikan }}"
                                            data-foto="{{ $user->foto }}"
                                            >
                                            <i class="dw dw-eye"></i> Detail
                                        </button>

                                    <a class="dropdown-item" href="{{ route('form.edit', $user->id) }}">
                                        <i class="dw dw-edit2"></i> Edit
                                    </a>

                                    <button class="dropdown-item text-danger btnDelete" data-id="{{ $user->id }}">
                                        <i class="dw dw-delete-3"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modalDetail" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title">Detail Anggota</h5>
					<button type="button" class="close text-white" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">

					<div class="text-center mb-3">
						<img id="detailFoto" class="rounded-lg border mw-100" style="max-height: 200px;">
					</div>

					<table class="table table-bordered">
						<tr><th>NIA</th>             <td id="detailNia"></td></tr>
						<tr><th>Username</th>       <td id="detailUsername"></td></tr>
						<tr><th>Alamat</th>         <td id="detailAlamat"></td></tr>
						<tr><th>Tetala</th>         <td id="detailTetala"></td></tr>
						<tr><th>Nama Ayah</th>      <td id="detailAyah"></td></tr>
						<tr><th>Nama Ibu</th>       <td id="detailIbu"></td></tr>
						<tr><th>Jabatan</th>        <td id="detailJabatan"></td></tr>
						<tr><th>Pendidikan</th>     <td id="detailPendidikan"></td></tr>
						<tr><th>Tahun Masuk</th>    <td id="detailTahun"></td></tr>
					</table>

				</div>

				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>

			</div>
		</div>
	</div>
    
</main>
<style>
    main {
        min-height: calc(100vh - 120px);
        padding-bottom: 40px; 
    }
    footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    function formatTanggal(tgl) {
        const d = new Date(tgl);
        return d.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        });
    }

    document.querySelectorAll(".btnDetail").forEach(btn => {
        btn.addEventListener("click", function () {

            document.getElementById("detailNia").innerText = this.dataset.nia;
            document.getElementById("detailUsername").innerText = this.dataset.username;
            document.getElementById("detailAlamat").innerText = this.dataset.alamat;document.getElementById("detailTetala").innerText =this.dataset.tempat + ", " + formatTanggal(this.dataset.tanggal);
            document.getElementById("detailAyah").innerText = this.dataset.ayah;
            document.getElementById("detailIbu").innerText = this.dataset.ibu;
            document.getElementById("detailJabatan").innerText = this.dataset.jabatan;
            document.getElementById("detailTahun").innerText = this.dataset.tahun;
            document.getElementById("detailPendidikan").innerText = this.dataset.pendidikan;

            let foto = this.dataset.foto;
            document.getElementById("detailFoto").src = foto 
                ? `/foto_anggota/${foto}` 
                : "https://via.placeholder.com/200x200?text=No+Photo";

            $("#modalDetail").modal("show");

        });
    });

});

</script>
<script>
     @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "{{ session('success') }}",
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: "error",
                title: "Gagal Menyimpan!",
                html: `{!! implode('<br>', $errors->all()) !!}`,
            });
        @endif
</script>


@endsection
