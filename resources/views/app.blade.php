<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' | ' : '' }} Sistem Informasi | Persal</title>

    <link rel="apple-touch-icon" sizes="180x180" href={{asset('vendors/images/apple-touch-icon.png')}}>
	<link rel="icon" type="image/png" sizes="32x32" href={{asset('vendors/images/favicon-32x32.png')}}>
	<link rel="icon" type="image/png" sizes="16x16" href={{asset('vendors/images/favicon-16x16.png')}}>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Owl Carousel (untuk slider trending) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- CSS Global --}}
    <style>
        body {
            background: #f5f6f8;
            font-family: "Segoe UI", sans-serif;
        }

        /* Navbar */
        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
            letter-spacing: 0.5px;
        }
        .nav-link {
            font-weight: 500;
        }

        /* Card Hover Effect */
        .hover-lift {
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .hover-lift:hover {
            transform: translateY(-6px);
            box-shadow: 0px 10px 25px rgba(0,0,0,.09);
        }

        /* Footer */
        footer {
            background: #212529;
            color: #eaeaea;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        footer a {
            text-decoration: none;
            color: #eaeaea;
        }
        footer a:hover {
            color: #ffffff;
        }

        /* Loader */
        #pageLoader {
            position: fixed;
            inset: 0;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

{{-- Loader --}}
<div id="pageLoader">
    <div class="spinner-border text-primary" role="status"></div>
</div>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fa-solid fa-globe"></i> Portal Informasi Seputar Persal
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/login') ? 'active' : '' }}" href="/login">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="{{ route('berita.public') }}">
                        Berita
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ route('galeri.public') }}">
                        Galeri
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>

{{-- Flash Message --}}
<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif
</div>

{{-- Main Content --}}
<main class="pb-5 flex-grow-1">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-dark text-white pt-4 pb-3">
    <div class="container">
        <div class="row">

            <!-- Informasi -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Portal Informasi Seputar Persal</h5>
                <p>Sistem Informasi berbasis web untuk publik dan anggota.</p>

                <h6 class="fw-bold mt-3">Ikuti Kami</h6>
                <div class="d-flex gap-3 mt-2">

                    <a href="https://wa.me/6281234567890" target="_blank" class="text-white fs-4">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <a href="https://facebook.com/" target="_blank" class="text-white fs-4">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/persal.produktif/" target="_blank" class="text-white fs-4">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="mailto:persalproduktif@gmail.com" class="text-white fs-4">
                        <i class="fa fa-envelope"></i>
                    </a>

                    <a href="https://www.tiktok.com/@persal_produktif" target="_blank" class="text-white fs-4">
                        <i class="fab fa-tiktok"></i>
                    </a>

                </div>
            </div>

            <!-- Navigasi -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('berita.public') }}" class="text-white">Berita</a></li>
                    <li><a href="{{ route('galeri.public') }}" class="text-white">Galeri</a></li>
                    <li><a href="/login" class="text-white">Login</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Kontak & Alamat</h5>

                <p class="mb-1">
                    <i class="fa fa-envelope me-2"></i> 
                    persalprodukti@gmail.com
                </p>

                <p class="mb-1">
                    <i class="fa fa-phone me-2"></i>
                    0812-3456-7890
                </p>

                <p class="mb-1">
                    <i class="fa fa-location-dot me-2"></i>
                    Kecamatan Lenteng, Sumenep, Jawa Timur
                </p>
            </div>

        </div>

        <div class="text-center mt-3">
            <hr class="border-secondary">
            <small class="text-white-50">
                Copyright © {{ date('Y') }} Persal Produktif | All Rights Reserved
            </small>
        </div>
    </div>
</footer>

{{-- CDN Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- Owl Carousel --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    // Loader
    window.onload = function() {
        document.getElementById('pageLoader').style.display = 'none';
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$('.slider-berita').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3500,
    autoplayHoverPause:true,
    margin:10,
    items:1,
    dots:true,
    nav:false
});
</script>
@stack('scripts')
</body>
</html>
