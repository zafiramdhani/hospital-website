<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>MedConnect</title>

  {{-- @vite([
    'public/assets/css/maicons.css',
    'public/assets/css/bootstrap.css',
    'public/assets/css/theme.css',
    'public/assets/vendor/owl-carousel/css/owl.carousel.css',
    'public/assets/vendor/animate/animate.css',
  ]) --}}

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
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

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Cari.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/home') }}">Beranda</a>
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
                <a class="nav-link" href="{{ url('myappointment') }}">Perjanjian Saya</a>
              </li>
              <li class="nav-item px-3" style="background-color: rgb(206, 206, 206); border-radius: 5px">
                <p class="mt-3">🤵 {{ Auth::user()->name }}</p>
              </li>
            @else
            
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
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

  <div align="center" class="p-5">
    <table class="text-center" border="1">
      <tr class="bg-primary text-white">
        <th class="px-5">Dokter</th>
        <th class="px-5">Tanggal</th>
        <th class="px-5">Pesan</th>
        <th class="px-5">Status</th>
        <th class="px-5">Aksi</th>
      </tr>

      @foreach ($get_appointments as $get_appointment)
        <tr>
          <td>{{ $get_appointment->doctor }}</td>
          <td>{{ $get_appointment->date }}</td>
          <td>{{ $get_appointment->message }}</td>
          <td>{{ $get_appointment->status }}</td>
          <td class="p-1">
            @if ($get_appointment->status === 'Disetujui' || $get_appointment->status === 'Ditolak')
              <p>✔</p>
            @else
              <a href="{{ url('cancel_appointment', $get_appointment->id) }}" onclick="return confirm('Hapus janji ini?')" class="btn btn-danger p-2">❌ Hapus</a>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>

  <script src="../assets/js/jquery-3.5.1.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="../assets/vendor/wow/wow.min.js"></script>
  <script src="../assets/js/theme.js"></script>

</body>
</html>