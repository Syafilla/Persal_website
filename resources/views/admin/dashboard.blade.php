@extends('admin')
@section('layout1')
<main>
	<div class="card-box" style="width:100%; overflow-x:auto;">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Dashboard</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.dashboard')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="row dashboard-stats">
				<div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-30">
					<div class="stats-card">
						<div class="progress-box text-center">
							<input type="text"
								class="knob"
								value="{{ $anggotaMasukPercent }}"
								data-width="120"
								data-height="120"
								data-min="0"
								data-max="100"
								data-angleOffset="-125"
								data-angleArc="250"
								data-thickness="0.12"
								data-fgColor="{{ $growthPercent >= 0 ? '#f56767' : '#3b82f6' }}"
								data-bgColor="#f3f4f6"
								data-readOnly="true">
							<h5 class="stats-title">Anggota Masuk</h5>
							<span class="d-block">
								<small>
									@if($growthPercent >= 0)
										⬆️ Naik dari tahun {{ $lastYear }}
									@else
										⬇️ Turun dari tahun {{ $lastYear }}
									@endif
								</small>
							</span>

						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-30">
					<div class="stats-card">
						<div class="progress-box text-center">
							<input type="text"
								class="knob"
								value="{{ $persenAlumni }}"
								data-width="120"
								data-height="120"
								data-min="0"
								data-max="100"
								data-thickness="0.12"
								data-angleOffset="-125"
								data-angleArc="250"
								data-fgColor="#a683eb"
								data-bgColor="#f3f4f6"
								data-readOnly="true">

							<h5 class="stats-title">Data Alumni</h5>
							<span class="d-block">
								<small>
									@if($persenAlumni >= 0)
										⬆️ Naik dari tahun {{ $lastYear }}
									@else
										⬇️ Turun dari tahun {{ $lastYear }}
									@endif
								</small>
							</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-30">
					<div class="stats-card">
						<div class="circle-wrapper">
							<div class="progress-circle green" data-value="{{ $totalAnggota }}">
								<span class="progress-number">{{ $totalAnggota }}</span>
							</div>
						</div>
						<p class="stats-title">Total Anggota</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6 col-6 mb-30">
					<div class="stats-card">
						<div class="circle-wrapper">
							<div class="progress-circle reed" data-value="{{ $totalAlumni }}">
								<span class="progress-number">{{ $totalAlumni }}</span>
							</div>
						</div>
						<p class="stats-title">Total Alumni</p>
					</div>
				</div>
			</div> 

			<div class="card-box mt-4 mb-30">
				<h4 class="text-center">Grafik Anggota Masuk per Tahun</h4>
				<canvas id="anggotaChart" height="100"></canvas>
			</div>

			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script>
				const ctx = document.getElementById('anggotaChart').getContext('2d');
				const anggotaChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: {!! json_encode($chartData->pluck('tahun_masuk')) !!},
						datasets: [{
							label: 'Jumlah Anggota Masuk',
							data: {!! json_encode($chartData->pluck('total')) !!},
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 99, 132, 1)',
							borderWidth: 2,
							borderRadius: 6
						}]
					},
					options: {
						responsive: true,
						scales: {
							y: {
								beginAtZero: true,
								title: { display: true, text: 'Jumlah Anggota' }
							},
							x: {
								title: { display: true, text: 'Tahun Masuk' }
							}
						}
					}
				});
			</script>
            <div class="card-box mb-30 table-responsive">
				<h2 class="h4 pd-20">List Anggota</h2>
				<table class="table-modern data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Foto Anggota</th>
							    <th>NI.A</th>
								<th>Username</th>
								<th>Alamat</th>
								<th>Pendidikan</th>
								<th>Jabatan</th>
								<th>Tahun Masuk</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($users as $user)
						<tr>
							<td>
								@if($user->foto)
									<img src="{{ asset('foto_anggota/' . $user->foto) }}" 
     									class="w-20 h-20 rounded-lg">
								@else
									<span class="text-muted">Tidak ada foto</span>
								@endif
							</td>
							<td>{{ $user->nia }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->alamat }}</td>
							<td>{{ $user->pendidikan }}</td>
							<td>{{ $user->jabatan }}</td>
							<td>{{ $user->tahun_masuk }}</td>
				</tr>
						@empty
							<tr>
								<td colspan="8" class="text-center text-muted">Belum ada data anggota</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
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
						<tr><th>Tempat Lahir</th>   <td id="detailTempat"></td></tr>
						<tr><th>Tanggal Lahir</th>  <td id="detailTanggal"></td></tr>
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
		<div class="modal fade" id="modalPassword" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formPassword">
					@csrf
					<div class="modal-header bg-primary text-white">
						<h5 class="modal-title">Ubah Password</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label>Password Lama</label>
							<input type="password" name="password_lama" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<input type="password" name="password_baru_confirmation" class="form-control" required>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>


@endsection