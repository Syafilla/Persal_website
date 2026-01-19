<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Persal Produktif</title>

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

	<style>
		
		html, body {
			height: 100%;
			margin: 0;
			display: flex;
			flex-direction: column;
			background-color: #f9fafb;
		}

		body {
			background-color: #f9fafb !important;
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
	</style>
	<style>
		main {
			min-height: calc(100vh - 120px); /* dorong konten supaya footer jatuh ke bawah */
			padding-bottom: 40px; /* beri jarak agar tidak rapat */
		}
		footer {
			position: relative;
			bottom: 0;
			width: 100%;
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
<body>
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
					<a class="dropdown-toggle no-arrow" href="#" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<h3>Notifikasi Kosong</h3>
									</a>
								</li>
							</ul>
						</div>
					</div>
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
						@if(Auth::user()->hak_akses == 'admin')
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <i class="dw dw-user1"></i> Profile
                            </a>
                        @elseif(Auth::user()->hak_akses == 'anggota')
                            <a class="dropdown-item" href="{{ route('anggota.profile') }}">
                                <i class="dw dw-user1"></i> Profile
                            </a>
                        @endif
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalPassword">
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
			<a href="{{route('anggota.dashboard')}}">
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
						<a href="{{route('anggota.dashboard')}}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="{{ route('galeri') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Galery</span>
						</a>
					</li>
					<li>
							<a href="{{ route('berita.public') }}" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-chat3"></span><span class="mtext">Berita</span>
							</a>
						</li>

						{{--<li>
							<a href="{{ route('jadwal_kegiatan.index') }}" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-calendar-2"></span><span class="mtext">Jadwal Kegiatan</span>
							</a>
						</li>
						--}}
					<li>
						<div class="dropdown-divider"></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
        <div class="main-container">
			<div class="pd-ltr-20">
				@yield('layout3')
			</div>
		</div>
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
