<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Persal Produktif</title>

	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<style>
		body.login-page{
			background:url('{{ asset('vendors/images/background/background.png') }}') no-repeat center center/cover;
			background-size:cover;
		}
		.slider img{
			width:100%;
			border-radius:8px;
		}
		.eye-toggle{cursor:pointer;font-size:18px;padding:7px;}
	</style>
	<style>
		body.login-page{
			background:url('{{ asset('vendors/images/background/background.png') }}') no-repeat center center/cover;
			background-size:cover;
			min-height:100vh;
			display:flex;
			flex-direction:column;
		}

		/* ================= SLIDER UTAMA ================= */
		.slider{
			width:100%;
			height:500px; /* DEFAULT DESKTOP */
			border-radius:16px;
			overflow:hidden;
			box-shadow:0 12px 30px rgba(0,0,0,.25);
		}

		.slider img{
			width:100%;
			height:100%;
			object-fit:cover;
			border-radius:16px;
		}

		/* ================= MOBILE ================= */
		@media (max-width:768px){
			.login-wrap .row{
				flex-direction:column;
				text-align:center;
			}

			.col-md-6,
			.col-lg-7,
			.col-lg-5{
				width:100%!important;
				max-width:100%;
				margin-bottom:25px;
			}

			.login-box{
				width:93%;
				margin:auto;
				border-radius:15px;
			}

			.slider{
				height:240px;
			}
		}

		/* ================= TABLET ================= */
		@media (min-width:768px) and (max-width:992px){
			.slider{
				height:360px;
			}

			.login-box{
				width:85%;
				margin:auto;
			}
		}

		/* ================= LAPTOP / CHROME DESKTOP ================= */
		@media (min-width:1000px){
			.login-wrap{
				padding-top:60px;
				padding-bottom:20px;
			}

			.slider{
				height:550px; 
			}
		}

		/* ================= FULL HD ================= */
		@media (min-width:1366px){
			.slider{
				height:600px; 
			}
		}

		.login-header{
			background:rgba(0,0,0,0.5);
			padding:10px;
		}

		.brand-logo img{
			width:250px;
		}
	</style>

	<style>
		.brand-logo-anim{
			width:150px;
			opacity:0;
			transform: scale(0.8);
			animation: fadeZoom 1.2s forwards ease-out;
			filter: drop-shadow(0 3px 6px rgba(0,0,0,.35));
		}
		@keyframes fadeZoom{
			to{
				opacity:1;
				transform:scale(1);
			}
		}

		.fade-in{
			animation: fadeText 1.2s ease-in-out;
		}
		@keyframes fadeText{
			from{ opacity:0; transform: translateY(5px); }
			to{ opacity:1; transform: translateY(0); }
		}

		.rotating-text{
			font-size:14px;
			height:30px;
			overflow:hidden;
			animation: fadeinout 3s infinite;
			margin-top:15px;         
			display:block;
			letter-spacing:.3px;
		}

		@keyframes fadeinout{
			0%{opacity:0;}
			10%{opacity:1;}
			90%{opacity:1;}
			100%{opacity:0;}
		}

		@media(max-width:576px){
			.brand-logo-anim{ width:70px; }
			.rotating-text{ font-size:12px; }
		}

		.login-header{
			padding: 5px 0 !important;     
			height: 40px;                  
			display:flex;
			align-items:center;
		}

		.login-header .brand-logo img{
			height:40px;                 
		}

		.login-header .login-menu ul li a{
			font-size:16px;
			font-weight:600;
			padding-top:5px;
		}
		#iconEye{
			transition: .3s;
		}
		#iconEye:hover{
			transform: translateY(-50%) scale(1.15);
		}
		.password-wrapper{
			position: relative;
		}

		.password-wrapper input{
			width: 100%;
			padding-right: 45px; /* supaya icon tidak menabrak tulisan */
			height: 45px; /* bisa sesuaikan */
		}

		.password-wrapper #iconEye{
			position: absolute;
			right: 15px;
			top: 50%;
			transform: translateY(-50%);
			font-size: 18px;
			cursor: pointer;
			color: #555;
			transition: .3s;
		}

		.password-wrapper #iconEye:hover{
			transform: translateY(-50%) scale(1.15);
		}


	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('login') }}">
					<img src="{{ asset('vendors/images/persal_logo.svg') }}" alt="Logo Persal">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="{{ route('berita.public') }}">Berita</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<div class="owl-carousel slider owl-theme">
						<div><img src="{{ asset('vendors/images/slider/slide1.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide2.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide3.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide4.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide5.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide6.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide7.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide8.jpg') }}"></div>
						<div><img src="{{ asset('vendors/images/slider/slide9.jpg') }}"></div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">

						<!-- TITLE -->
						<div class="login-title mb-3">
							<h2 id="formTitle" class="text-center text-primary">Login Persal Produktif</h2>
						</div>

						<!-- ============ LOGIN ============== -->
						<form id="loginForm" method="POST" action="{{ route('login') }}">
							@csrf

							<div class="login-brand text-center mb-4">
								<img class="brand-logo-anim" src="{{ asset('vendors/images/apple-touch-icon.png') }}" alt="Logo Persal">
								<p class="text-muted rotating-text"></p>
							</div>

							<label class="fw-semibold">NIA</label>
							<div class="input-group custom"> 
								<input type="text" name="nia" class="form-control form-control-lg" placeholder="N.I.A"> 
								<div class="input-group-append custom"> 
									<span class="input-group-text">
										<i class="icon-copy dw dw-user1"></i>
									</span>
								</div> 
							</div>

							<label>Password</label>
							<div class="password-wrapper mb-3">
								<input type="password" name="password" id="password" class="form-control" placeholder="*********" required>
								<i id="iconEye" class="fa-solid fa-eye" onclick="togglePass()"></i>
							</div>
							
							<div class="row pb-30">
								<div class="col-6 d-flex align-items-center">
									<button type="button" id="btnShowForgotNia" class="btn btn-link text-primary p-0">
										Lupa N.I.A?
									</button>
								</div>

								<div class="col-6 d-flex justify-content-end align-items-center">
									<button type="button" id="btnShowForgot" class="btn btn-link text-primary p-0">
										Lupa Password?
									</button>
								</div>
							</div>

							<button class="btn btn-primary btn-lg btn-block mb-3" type="submit">Log In</button>

							<div class="text-center mt-3 mb-2">
								<span class="text-muted">──────── OR ────────</span>
							</div>

							<div class="text-center">
								<button type="button" id="btnShowRegister" class="btn btn-outline-primary btn-sm">
									Register Akun
								</button>
							</div>

						</form>

						<!-- ============ REGISTER =========== -->
						<form id="registerForm" style="display:none;">
							@csrf

							<div class="text-center mb-3">
								<img class="brand-logo-anim" src="{{ asset('vendors/images/apple-touch-icon.png') }}">
							</div>

							<!-- STEP 1: CEK NIA -->
							<div id="regStep1">
								<label class="fw-semibold">Masukkan NIA</label>
								<input type="text" id="regNIA" class="form-control mb-3" placeholder="NIA Anda" required>
								<button type="button" id="btnCheckNIA" class="btn btn-primary w-100">Lanjutkan</button>
							</div>

							<!-- STEP 2: DATA DITEMUKAN -->
							<div id="regStep2" style="display:none;">
								<div class="alert alert-success p-2">
									<strong>Data ditemukan!</strong><br>
									Nama: <span id="showNama"></span><br>
									Tahun Masuk: <span id="showTahun"></span>
								</div>

								<input type="hidden" name="nia" id="finalNIA">
								<label>Alamat</label>
								<input type="alamat" id="regAlamat" name="alamat" class="form-control mb-2" required>

								<div>
									<label class="font-semibold">Pendidikan</label>
									<select id="regPendidikan" name="pendidikan" class="w-full border rounded-lg p-2">
										<option value="">-- Pilih Pendidikan --</option>
										<option value="SLTP" {{ old('pendidikan')=='SLTP' ? 'selected' : '' }}>SLTP</option>
										<option value="SLTA" {{ old('pendidikan')=='SLTA' ? 'selected' : '' }}>SLTA</option>
										<option value="PT" {{ old('pendidikan')=='PT' ? 'selected' : '' }}>PT</option>
										<option value="Pasca Sarjana" {{ old('pendidikan')=='Pasca Sarjana' ? 'selected' : '' }}>PASCA SARJANA</option>
									</select>
								</div>

								<label>Email</label>
								<input type="email" id="regEmail" name="email" class="form-control mb-2" required>

								<small id="emailStatus" class="text-danger"></small>

								<label>Password</label>
								<input type="password" id="regPassword" name="password" class="form-control mb-1" required>

								<!-- PASSWORD STRENGTH -->
								<div class="progress mb-2">
									<div id="pwMeter" class="progress-bar" style="width:0%;"></div>
								</div>

								<button type="button" id="btnSubmitRegister" class="btn btn-success w-100">Daftarkan Akun</button>
							</div>

							<div class="text-center mt-3">
								<button type="button" id="btnBackToLogin" class="btn btn-outline-secondary btn-sm">
									Kembali ke Login
								</button>
							</div>
						</form>
						<!-- ============ FORGOT PASSWORD (CEK EMAIL) ============== -->
						<form id="forgotForm" style="display:none;">
							@csrf

							<h2 class="text-center text-primary mb-3">Lupa Password</h2>

							<label>Email Terdaftar</label>
							<input type="email" id="forgotEmail" class="form-control mb-3" placeholder="Masukkan email terdaftar" required>

							<button type="button" id="btnCheckEmail" class="btn btn-primary w-100">
								Cek Email
							</button>

							<div class="text-center mt-3">
								<button type="button" id="backToLoginForgot" class="btn btn-outline-secondary btn-sm">
									Kembali ke Login
								</button>
							</div>
						</form>
						<form id="resetForm" style="display:none;">
							@csrf

							<h2 class="text-center text-primary mb-3">Reset Password</h2>

							<label>Password Baru</label>
							<input type="password" id="newPassword" class="form-control mb-2" required>

							<label>Konfirmasi Password Baru</label>
							<input type="password" id="confirmPassword" class="form-control mb-3" required>

							<input type="hidden" id="resetEmail">

							<button type="button" id="btnResetPassword" class="btn btn-primary w-100">
								Reset Password
							</button>
						</form>

						<!---Lupa NIA-->
						<form id="forgotNiaForm" style="display:none;">
							@csrf

							<h2 class="text-center text-primary mb-3">Lupa NIA</h2>

							<label>Nama Lengkap Anggota</label>
							<input type="text" id="forgotNiaName" class="form-control mb-3" placeholder="Masukkan nama lengkap" required>

							<button type="button" id="btnFindNia" class="btn btn-primary w-100">
								Cari NIA
							</button>

							<div id="niaResult" class="alert alert-success mt-3" style="display:none;">
								<strong>NIA:</strong> <span id="showNia"></span><br>
								<strong>Tahun Masuk:</strong> <span id="showTahunMasuk"></span>
							</div>

							<div class="text-center mt-3">
								<button type="button" id="backToLoginNia" class="btn btn-outline-secondary btn-sm">
									Kembali ke Login
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
		const texts = [
			"Sistem manajemen anggota terpadu",
			"Cepat, efisien, dan mudah digunakan",
			"Optimalkan pengelolaan organisasi Anda",
			"Data aman dan terstruktur"
		];

		let i = 0;
		const rotating = document.querySelector(".rotating-text");
		setInterval(()=>{
			rotating.innerHTML = texts[i];
			i = (i+1) % texts.length;
		},3000);
		rotating.innerHTML = texts[0];
	</script>
	
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				dots:true,
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				items:1
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@if(session('loginError'))
	<script>
	Swal.fire({
		icon: 'error',
		title: 'Login Gagal!',
		text: '{{ session("loginError") }}',
		 timer: 2000,
		showConfirmButton: true
	});
	</script>
	@endif
	<script>

		$("#btnShowRegister").click(function () {
			$("#loginForm").hide();
			$("#registerForm").fadeIn(300);
			$("#formTitle").text("Registrasi Akun Anggota");
		});

		$("#btnBackToLogin").click(function () {
			$("#registerForm").hide();
			$("#loginForm").fadeIn(300);
			$("#formTitle").text("Login Persal Produktif");
		});


		function togglePass(){
			let input = document.getElementById('password');
			let icon = document.getElementById('iconEye');

			if(input.type === "password"){
				input.type = "text";
				icon.classList.replace("fa-eye","fa-eye-slash");
			} else {
				input.type = "password";
				icon.classList.replace("fa-eye-slash","fa-eye");
			}
		}


		$("#btnCheckNIA").click(function(){
			let nia = $("#regNIA").val();

			$.post("{{ url('/register/check-nia') }}", {
				_token: "{{ csrf_token() }}",
				nia: nia
			}, function(res){

				if (res.status === false) {
					Swal.fire("Gagal!", res.message, "error");
				} else {
					$("#regStep1").hide();
					$("#regStep2").fadeIn(300);

					$("#showNama").text(res.data.name);
					$("#showTahun").text(res.data.tahun_masuk);
					$("#finalNIA").val(nia);
				}
			});
		});


		$("#regEmail").on("input", function(){
			let email = $(this).val();

			if (!email.includes("@") || !email.includes(".")) {
				$("#emailStatus").text("Email tidak valid");
			} else {
				$("#emailStatus").text("");
			}
		});


		$("#regPassword").on("input", function(){
			let pw = $(this).val();
			let strength = 0;

			if (pw.length >= 6) strength += 25;
			if (/[A-Z]/.test(pw)) strength += 25;
			if (/[0-9]/.test(pw)) strength += 25;
			if (/[^A-Za-z0-9]/.test(pw)) strength += 25;

			$("#pwMeter").css("width", strength + "%");

			$("#pwMeter").removeClass().addClass("progress-bar");

			if (strength < 50)
				$("#pwMeter").addClass("bg-danger");
			else if (strength < 75)
				$("#pwMeter").addClass("bg-warning");
			else
				$("#pwMeter").addClass("bg-success");
		});


		$("#btnSubmitRegister").click(function(){

			$.post("{{ url('/register/submit') }}", {
				_token: "{{ csrf_token() }}",
				nia: $("#finalNIA").val(),
				alamat: $("#regAlamat").val(),
        		pendidikan: $("#regPendidikan").val(),
				email: $("#regEmail").val(),
				password: $("#regPassword").val()
			},

			function(res){
				Swal.fire({
					icon: "success",
					title: "Berhasil!",
					text: "Akun Berhasil Diaktifkan, silakan login."
				}).then(()=> window.location.reload());
			})

			.fail(function(xhr){
				Swal.fire("Gagal!", "Periksa kembali data Anda.", "error");
			});

		});
		
		document.getElementById("btnShowForgot").addEventListener("click", function () {
			loginForm.style.display = "none";
			forgotForm.style.display = "block";
			resetForm.style.display = "none";
		});
		document.getElementById("backToLoginForgot").addEventListener("click", function () {
			forgotForm.style.display = "none";
			loginForm.style.display = "block";
		});



		document.getElementById("btnCheckEmail").addEventListener("click", function () {

			let email = document.getElementById("forgotEmail").value;

			if (!email) {
				Swal.fire("Error", "Email wajib diisi", "error");
				return;
			}

			fetch("{{ route('password.checkEmailDirect') }}", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				},
				body: JSON.stringify({ email })
			})
			.then(res => res.json())
			.then(res => {
				if (res.status === 'success') {

					Swal.fire({
						icon: 'success',
						title: 'Email Terverifikasi',
						text: res.message,
						confirmButtonText: 'Lanjutkan'
					}).then(() => {
						forgotForm.style.display = "none";
						resetForm.style.display = "block";
						document.getElementById("resetEmail").value = email;
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Gagal',
						text: res.message
					});
				}
			})
			.catch(() => {
				Swal.fire({
					icon: 'error',
					title: 'Server Error',
					text: 'Terjadi kesalahan pada server'
				});
			});
		});
		document.getElementById("btnResetPassword").addEventListener("click", function () {

			let email = document.getElementById("resetEmail").value;
			let password = document.getElementById("newPassword").value;
			let confirm = document.getElementById("confirmPassword").value;

			if (password !== confirm) {
				Swal.fire("Error", "Konfirmasi password tidak sama", "error");
				return;
			}

			fetch("{{ route('password.resetDirect') }}", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				},
				body: JSON.stringify({
					email: email,
					password: password,
					password_confirmation: confirm
				})
			})
			.then(res => res.json())
			.then(data => {

				if (data.status === "error") {
					Swal.fire("Gagal", data.message, "error");
					return;
				}

				Swal.fire({
					icon: "success",
					title: "Berhasil",
					text: "Password berhasil diubah"
				}).then(() => {
					resetForm.style.display = "none";
					loginForm.style.display = "block";
				});

			})
			.catch(() => {
				Swal.fire("Warning", "Pasword tidak boleh Kurang dari 6 digit", "error");
			});
		});

		document.getElementById("btnShowForgotNia").addEventListener("click", function () {
			document.getElementById("loginForm").style.display = "none";
			document.getElementById("forgotNiaForm").style.display = "block";
		});

		document.getElementById("backToLoginNia").addEventListener("click", function () {
			document.getElementById("forgotNiaForm").style.display = "none";
			document.getElementById("loginForm").style.display = "block";
		});

		document.getElementById("btnFindNia").addEventListener("click", function () {

			let name = document.getElementById("forgotNiaName").value;

			if (!name) {
				Swal.fire("Error", "Nama wajib diisi", "error");
				return;
			}

			let formData = new FormData();
			formData.append("name", name);
			formData.append("_token", "{{ csrf_token() }}");

			fetch("{{ route('forgot.nia') }}", {
				method: "POST",
				body: formData
			})
			.then(res => res.json())
			.then(data => {

				if (data.status === "error") {
					Swal.fire("Gagal", data.message, "error");
					return;
				}

				document.getElementById("niaResult").style.display = "block";
				document.getElementById("showNia").innerText = data.data.nia;
				document.getElementById("showTahunMasuk").innerText = data.data.tahun_masuk;
			})
			.catch(() => {
				Swal.fire("Error", "Terjadi kesalahan server", "error");
			});
		});
	</script>
</body>
</html>
	