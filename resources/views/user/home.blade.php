<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>MedConnect</title>

  @vite([
    'public/assets/css/maicons.css',
    'public/assets/css/bootstrap.css',
    'public/assets/css/theme.css',
    'public/assets/vendor/owl-carousel/css/owl.carousel.css',
    'public/assets/vendor/animate/animate.css',
  ])

  {{-- <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css"> --}}
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    {{-- <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> 021 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> med@connect.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar --> --}}

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Med</span>Connect</a>

        {{-- <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Cari..." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form> --}}

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Dokter</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Kontak</a>
            </li>
            
            @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a class="nav-link" href="{{ url('myappointment') }}">Perjanjian saya</a>
              </li>
              <li class="nav-item px-3 text-white" style="background-color: #ff556e; border-radius: 5px">
                <p class="mt-3">🙍‍♂️ {{ Auth::user()->name }}</p>
              </li>
            @else
            
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Masuk</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Daftar</a>
            </li>

            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  @if (session()->has('message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">X</button>
      {{ session()->get('message') }}
    </div>
  @endif
  
  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Mari buat hidup anda lebih bahagia</span>
        <h1 class="display-4">MedConnect</h1>
        <a href="#" class="btn btn-primary">Ayo Konsultasi</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Konsultasi</span><br>24 Jam</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span>Proteksi</span> Kesehatan</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span>Farmasi</span> Lengkap</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Selamat Datang di Website<br> MedConnect</h1>
            <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
            <a href="about.html" class="btn btn-primary">Baca Selengkapnya</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  @include('user.doctor')

  @include('user.latestnews')

  @include('user.appointment')

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Dapatkan kemudahan mengakses layanan kami dengan aplikasi MedConnect</h1>
          <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Perusahaan</h5>
          <ul class="footer-menu">
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Karir</a></li>
            <li><a href="#">Tim Editor</a></li>
            <li><a href="#">Proteksi</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Lain-lain</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privasi</a></li>
            <li><a href="#">Iklan</a></li>
            <li><a href="#">Gabung sebagai dokter</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Partner Kami</h5>
          <ul class="footer-menu">
            <li><a href="#">MedFitness</a></li>
            <li><a href="#">MedDrugs</a></li>
            <li><a href="#">MedLive</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Kontak</h5>
          <p class="footer-link mt-2">Jl. Veteran No. 21 Kota Baru, Jawa Selatan, Indonesia</p>
          <a href="#" class="footer-link">021-701-5733</a>
          <a href="#" class="footer-link">medcompany@med.net</a>

          <h5 class="mt-3">Ikuti Kami</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2023 <a href="#" target="_blank">MedCompany</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>