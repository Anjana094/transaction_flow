<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Landing Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{URL::asset('public/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('public/assets/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::asset('public/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="#">BrandName</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="#">Product</a></li>
          <li><a class="nav-link scrollto" href="#">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#">Contact</a></li>
      </nav><!-- .navbar -->
      <a href="#" class="scrollto"><span class="d-none d-md-inline">Login</span></a>
      <a href="#" class="appointment-btn scrollto"><span class="d-none d-md-inline">Become a Member</span></a>
     
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" style="text-align: center;">
      <h1>Creating a Beautiful <br>& Usefull Solutions</h1>
      <h2>We Know how large objects will act, but things on a <br>small scale just do not act that way.</h2>
      <a class="btn-get-started scrollto">Get Quote Now</a>
      <a class="btn-learn-more scrollto">Learn More</a>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <img src="{{URL::asset('public/assets/img/icn resize icn-md.png')}}"></img>
                  <h4>Investment Trading</h4>
                  <p>the quick fox jumps over the lazy dog</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <img src="{{URL::asset('public/assets/img/icn resize icn-md.png')}}"></img>
                  <h4>Raising Funds</h4>
                  <p>the quick fox jumps over the lazy dog</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0" style=" background-color: #23a6f0 !important;color: #fff !important;">
                  <img src="{{URL::asset('public/assets/img/icn resize icn-md-2.png')}}"></img>
                  <h4>Financial Analysis</h4>
                  <p style="color: #fff !important;">the quick fox jumps over the lazy dog</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>A</span></strong>. All Rights Reserved
        </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>