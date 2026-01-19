<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Dashboard - Persal Produktif</title>

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
	<script src="https://cdn.tailwindcss.com"></script>
  	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<style>
		html, body {
			height: 100%;
			margin: 0;
			display: flex;
			flex-direction: column;
			background-color: #f9fafb;
		}

		#layoutSidenav_content {
			flex: 1;
			display: flex;
			flex-direction: column;
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


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
						<a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="dw dw-user1"></i> Profile</a>

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
			<a href="index.html">
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
            	@yield('layout2')
            </div>
		</div>
	
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
</body>
</html>
