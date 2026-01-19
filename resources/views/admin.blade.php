<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin- Persal Produktif</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href={{asset('vendors/images/apple-touch-icon.png')}}>
	<link rel="icon" type="image/png" sizes="32x32" href={{asset('vendors/images/favicon-32x32.png')}}>
	<link rel="icon" type="image/png" sizes="16x16" href={{asset('vendors/images/favicon-16x16.png')}}>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/core.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/icon-font.min.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}>
	<link rel="stylesheet" type="text/css" href={{asset('vendors/styles/style.css')}}>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<style>
		
		html, body {
			height: 100%;
			margin: 0;
			display: flex;
			flex-direction: column;
			background-color: #f9fafb;
		}

		body {
			background-color: #ffffffff !important;
		}

		footer {
			margin-top: auto;
			background-color: #212529;
			color: white;
			text-align: center;
			padding: 10px 0;
			font-size: 14px;
			box-shadow: 0 -2px 6px rgba(0,0,0,0.2);
		}
	</style>
	<style>
	.ck-editor__editable_inline {
		min-height: 300px;
		background-color: #f9fafb;
		border-radius: 8px;
		padding: 16px;
	}
	.dark .ck-editor__editable_inline {
		background-color: #1f2937;
		color: #f3f4f6;
	}
	.header{
		background:#111827 !important;  /* warna gelap */
		color:white !important;
		border-bottom:1px solid #1f2937;
	}


	</style>
	



	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="d-flex flex-column min-vh-100">
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src={{asset('vendors/images/persal_logo.svg')}} alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<!-- SEARCH -->
			<div class="header-search" style="width: 250px;">
				<form id="searchForm">
					<div class="form-group mb-0 position-relative">
						<i class="dw dw-search2 search-icon"></i>
						<input 
							type="text" 
							id="searchInput" 
							class="form-control search-input" 
							placeholder="Search..."
							autocomplete="off"
						>
						<div id="searchResult" 
							class="dropdown-menu" 
							style="width:100%; max-height:200px; overflow-y:auto;">
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="header-right">

			<!-- NOTIFICATION ICON -->
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow"data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						@php
						$notifs = \App\Models\Notification::orderBy('created_at','desc')->limit(10)->get();
						@endphp
							<a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
								<i class="icon-bell"></i>
								@if($notifs->where('status',0)->count() > 0)
									<span class="badge bg-danger">{{ $notifs->where('status',0)->count() }}</span>
								@endif
							</a>
							<div class="dropdown-menu dropdown-menu-end p-2" style="min-width:320px;">
								<div class="notification-list" style="max-height:320px; overflow:auto;">
									@forelse($notifs as $n)
									<a href="{{ route('admin.notification.read', $n->id) }}" class="d-block mb-2 text-decoration-none">
										<div class="small text-muted">{{ $n->created_at->diffForHumans() }}</div>
										<div>{{ Str::limit($n->pesan,80) }}</div>
									</a>
									@empty
									<div class="text-center text-muted p-3">Notifikasi Kosong</div>
									@endforelse
								</div>
							</div>
					</a>
				</div>
			</div>
			<!-- USER DROPDOWN -->
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">

						<span class="user-icon">
							<img 
								src="{{ Auth::user()->foto 
									? asset('foto_anggota/' . Auth::user()->foto) 
									: asset('vendors/images/default-avatar.png') }}"
								alt="Foto User"
							>
						</span>

						<span class="user-name">
							{{ Auth::user()->name }} <br>
							<small class="text-muted">{{ Auth::user()->hak_akses }}</small>
						</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="ubah.password" data-toggle="modal" data-target="#modalPassword">
							<i class="dw dw-padlock"></i> Ganti Password
						</a>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="dropdown-item" type="submit">
								<i class="dw dw-logout"></i> Log Out
							</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href={{route('admin.dashboard')}}>
				<img src={{asset('vendors/images/deskapp-logo.svg')}} alt="" class="dark-logo">
				<img src={{asset('vendors/images/Recovered_UNTITLED-1.svg')}} alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="{{route('admin.dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="{{ route('form.create') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Input Data</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="{{ route('anggota.list') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-2"></span><span class="mtext">Data Anggota</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="{{ route('admin.galeri') }}" class="dropdown-toggle no-arrow">
							<span class="micon fas fa-images"></span><span class="mtext">Galeri</span>
						</a>
					</li>

					<li>
						<a href="{{ route('admin.berita') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Berita</span>
						</a>
					</li>

					{{--
					<li class="dropdown">
						<a href="{{ route('data_kegiatan.index') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Data Kegiatan</span>
						</a>
					</li>

					<li>
						<a href="{{ route('jadwal_kegiatan.index') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar-2"></span><span class="mtext">Jadwal Kegiatan</span>
						</a>
					</li>--}}

					<li>
						<div class="dropdown-divider"></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
        <div class="main-container">
			<div class="pd-ltr-20">
				@yield('layout1')
			</div>
		</div>
	<style>
	/* === RESPONSIVE HEADER ICON === */
	@media (max-width: 768px) {
		.header-right .icon,
		.header-right i {
			font-size: 18px !important;
		}
	}

	/* === RESPONSIVE KNOB CIRCLE === */
	@media (max-width: 768px) {
		.progress-box input.knob {
			width: 80px !important;
			height: 80px !important;
		}
		.progress-box h5 {
			font-size: 14px !important;
		}
		.progress-box span {
			font-size: 12px !important;
		}
	}

	/* === RESPONSIVE DATA TABLE === */
	.table-responsive {
		overflow-x: auto;
	}

	/* === RESPONSIVE CARD CONTAINER === */
	.card-box {
		width: 100%;
		overflow-x: auto;
	}

	/* === RESPONSIVE CANVAS CHART === */
	#anggotaChart {
		width: 100% !important;
		max-width: 100% !important;
	}

	/* === FIX SIDEBAR AGAR TIDAK MEPET === */
	@media(max-width: 768px){
		.left-side-bar {
			width: 240px;
		}
	}
	/* ===================== MODERN TABLE DESIGN ====================== */
	.table-modern {
		width: 100%;
		border-collapse: separate;
		border-spacing: 0 10px;
		font-size: 14px;
	}

	.table-modern thead th {
		background: #ffffff;
		color: #1a1a1a;
		font-weight: 600;
		text-align: center;
		padding: 14px;
		border-bottom: 2px solid #e5e7eb;
	}

	.table-modern tbody tr {
		background: #fff;
		transition: .3s;
		border-radius: 10px;
	}

	.table-modern tbody tr:hover {
		transform: scale(1.01);
		box-shadow: 0 4px 14px rgba(0,0,0,0.08);
	}

	.table-modern tbody td {
		padding: 14px;
		vertical-align: middle;
		text-align: center;
	}

	/* Foto tampil melingkar lebih rapi */
	.table-modern img {
		width: 45px;
		height: 45px;
		border-radius: 10px;
		object-fit: cover;
		border: 2px solid #e5e7eb;
	}

	/* Tombol dropdown */
	.dropdown-menu a, .dropdown-menu button {
		padding: 10px 14px;
		transition: .2s;
	}
	.dropdown-menu a:hover, .dropdown-menu button:hover {
		background: #f3f4f6;
	}

	/* Card wrapping */
	.card-box.table-responsive {
		border-radius: 12px;
		padding: 15px;
		background: #ffffff;
		box-shadow: 0 3px 12px rgba(0,0,0,0.05);
	}

	/* Header judul tabel */
	.card-box h2 {
		font-weight: 700;
		margin-bottom: 15px;
		color: #111827;
	}

	/* Scroll horizontal tetap smooth */
	.table-responsive { scroll-behavior: smooth; }
	/* ---------------- DARK MODE ---------------- */
	.dark {
		background-color:#0f172a !important;
		color:#f1f5f9 !important;
	}

	.dark .card-box,
	.dark table,
	.dark .table-modern tbody tr,
	.dark .modal-content{
		background:#1e293b!important;
		color:#e2e8f0!important;
		border-color:#334155!important;
	}

	.dark thead th{
		background:#1e293b!important;
		color:#fff!important;
		border-bottom:2px solid #475569!important;
	}

	.dark .table-modern tbody tr:hover{
		box-shadow:0 4px 14px rgba(255,255,255,.07);
		transform:scale(1.01);
	}

	.dark .dropdown-menu{
		background:#1e293b!important;
	}

	.dark .dropdown-menu a:hover{
		background:#334155!important;
		color:white!important;
	}

	.dark .header,
	.dark .left-side-bar{
		background:#0f172a!important;
	}

	/* Switch pressed mode */
	#themeToggle.active{
		background:#0ea5e9!important;
		color:white!important;
	}

	#themeIcon{font-size:18px;}
	</style>
	<script>
	document.addEventListener("DOMContentLoaded", function () {

		// === DELETE HANDLER ===
		document.querySelectorAll(".btnDelete").forEach(btn => {
			btn.addEventListener("click", function () {

				const userId = this.dataset.id;

				Swal.fire({
					title: "Hapus Data?",
					text: "Data anggota akan dihapus permanen!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#e3342f",
					cancelButtonColor: "#6c757d",
					confirmButtonText: "Ya, hapus!",
					cancelButtonText: "Batal",
					heightAuto: false
				}).then((result) => {
					if (result.isConfirmed) {

						fetch(`/admin/user/${userId}`, {
							method: "DELETE",
							headers: {
								"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
								"Accept": "application/json"
							}
						})
						.then(res => res.json())
						.then(data => {

							if (data.success) {

								Swal.fire({
									title: "Berhasil!",
									text: data.message,
									icon: "success",
									timer: 1500,
									showConfirmButton: false,
									heightAuto: false
								});

								const row = btn.closest("tr");
								row.classList.add("animate__animated", "animate__fadeOut");
								setTimeout(() => row.remove(), 500);
							}

						})
						.catch(err => {
							Swal.fire("Error!", "Terjadi kesalahan server.", "error");
						});
					}
				});
			});
		});

	});
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

		<!-- Sweetalert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			document.querySelectorAll(".btnDetail").forEach(btn => {
				btn.addEventListener("click", function () {

					// Ambil data dari atribut
					document.getElementById("detailNia").innerText = this.dataset.nia;
					document.getElementById("detailUsername").innerText = this.dataset.username;
					document.getElementById("detailTempat").innerText = this.dataset.tempat;
					document.getElementById("detailTanggal").innerText = this.dataset.tanggal;
					document.getElementById("detailAyah").innerText = this.dataset.ayah;
					document.getElementById("detailIbu").innerText = this.dataset.ibu;
					document.getElementById("detailJabatan").innerText = this.dataset.jabatan;
					document.getElementById("detailTahun").innerText = this.dataset.tahun;
					document.getElementById("detailPendidikan").innerText = this.dataset.pendidikan;

					// Foto
					let foto = this.dataset.foto;
					document.getElementById("detailFoto").src = foto 
						? `/foto_anggota/${foto}` 
						: "https://via.placeholder.com/200x200?text=No+Photo";

					// Tampilkan modal
					$("#modalDetail").modal("show");

				});
			});

		});
	</script>

	<script>
		document.getElementById('formPassword').addEventListener('submit', function(e) {
			e.preventDefault();

			let form = this;
			let formData = new FormData(form);

			fetch("{{ route('ubah.password') }}", {
				method: "POST",
				headers: {
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
					'Accept': 'application/json'
				},
				body: formData
			})
			.then(async response => {
				const data = await response.json();
				if (!response.ok) throw data;
				return data;
			})
			.then(data => {
				Swal.fire({
					icon: 'success',
					title: 'Berhasil',
					text: data.message,
					timer: 2000,
					showConfirmButton: false
				});
				form.reset();

				$('#modalPassword').modal('hide');
				document.body.classList.remove('modal-open');
    			document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
			})
			.catch(err => {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: err.message || 'Terjadi kesalahan'
				});
			});
			$('#modalPassword').on('hidden.bs.modal', function () {
				document.body.classList.remove('modal-open');
				document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
			});
		});
	</script>
	<style>
	.stats-card {
		background: #ffffff;
		padding: 25px;
		border-radius: 22px;
		box-shadow: 0 4px 18px rgba(0,0,0,0.07);
		text-align: center;
		transition: 0.3s ease;
		height: 100%;
	}

	.stats-card:hover {
		transform: translateY(-4px);
		box-shadow: 0 10px 28px rgba(0,0,0,0.12);
	}

	.circle-wrapper {
		display: flex;
		justify-content: center;
		margin-bottom: 12px;
	}

	.progress-circle {
		width: 120px;
		height: 120px;
		border-radius: 50%;
		border: 8px solid #ffbebe;
		border-top-color: #ff7070;
		display: flex;
		align-items: center;
		justify-content: center;
		font-weight: 700;
		font-size: 28px;
		color: #ff5252;
	}

	.progress-circle.green {
		border-color: #caffdd;
		border-top-color: #32c96f;
		color: #1dbd5e;
	}

	.progress-circle.purple {
		border-color: #e3cdff;
		border-top-color: #b97aff;
		color: #a55af7;
	}

	.stats-title {
		margin-top: 8px;
		font-size: 17px;
		font-weight: 600;
		color: #555;
	}

	/* ===== FORCE 1 ROW ON DESKTOP ===== */
	@media (min-width: 992px) {
		.dashboard-stats {
			display: flex;
			flex-wrap: nowrap;
		}
		.dashboard-stats > div {
			flex: 0 0 25%;
			max-width: 25%;
		}
	}

	/* ===== MOBILE 2x2 ===== */
	@media (max-width: 767px) {
		.dashboard-stats {
			display: flex;
			flex-wrap: wrap;
		}
		.dashboard-stats > div {
			flex: 0 0 50%;
			max-width: 50%;
		}
	}
	.knob {
		background: transparent !important;
		border: none !important;
		box-shadow: none !important;
	}
	</style>
	<script>
	$(function () {
		$(".knob").knob({
			format: function (value) {
				return value + "%";
			}
		});
	});
	</script>
	<!-- js -->
	<script src={{asset('vendors/scripts/core.js')}}></script>
	<script src={{asset('vendors/scripts/script.min.js')}}></script>
	<script src={{asset('vendors/scripts/process.js')}}></script>
	<script src={{asset('vendors/scripts/layout-settings.js')}}></script>
	<script src={{asset('src/plugins/jQuery-Knob-master/jquery.knob.min.js')}}></script>
	<script src={{asset('src/plugins/highcharts-6.0.7/code/highcharts.js')}}></script>
	<script src={{asset('src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}></script>
	<script src={{asset('src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}></script>
	<script src={{asset('src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}></script>
	<script src={{asset('vendors/scripts/dashboard2.js')}}></script>
	
	<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; {{ date('Y') }} Persal Produktif  | All Rights Reserved</p>
	</footer>
	<script>
		document.getElementById("searchInput").addEventListener("keyup", function () {
			let q = this.value;

			if (q.length < 1) {
				document.getElementById("searchResult").classList.remove("show");
				return;
			}

			fetch("/search?q=" + q)
				.then(res => res.json())
				.then(data => {
					let box = document.getElementById("searchResult");
					box.innerHTML = "";

					if (data.length === 0) {
						box.innerHTML = "<span class='dropdown-item'>Tidak ditemukan</span>";
					} else {
						data.forEach(item => {
							box.innerHTML += `
								<a href="/anggota/${item.id}" class="dropdown-item">
									${item.nama}
								</a>
							`;
						});
					}

					box.classList.add("show");
				});
		});
	</script>
</body>
</html>
