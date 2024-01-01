<!DOCTYPE html>
<html lang="en">

<head>
  <title> @yield('site-title') | Jainam</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/common.css') }}">
  @yield('included-css')
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/menu.css') }}">
  <style>
    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .navbar {
      transition: 0.5s; /* Add smooth transition effect */
    }
  </style>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha_v3_site_key') }}"></script>
  
  @yield('include-css')
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light myTopnav" id="myTopnav">
    <div class="container-fluid topnav" id="myTopnav">
      <div class="row mx-auto mx-lg-5 px-lg-5 w-100">
        <div class="col-12">
          <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse align-items-baseline mt-3 mt-md-0" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="{{ route('homepage') }}">
              <img src="{{ asset('assets/frontend/img/logos/logo.svg') }}" alt="" class="img-fluid">
            </a>
            <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0">
              <li class="header-nav-item nav-item">
                <a class="header-nav-link nav-link {{ request()->path() === '/' ? "active" : "" }}" aria-current="page" href="{{ route('homepage') }}">Home</a>
              </li>
              <li class="header-nav-item nav-item">
                <a class="header-nav-link nav-link {{ request()->path() === 'all-apis' ? "active" : "" }}" href="{{ route('all.apis') }}">API </a>
              </li>
              <li class="header-nav-item nav-item">
                <a class="header-nav-link nav-link" href="{{ route('homepage') }}#conatct-us">Support</a>
              </li>
            </ul>
            <form class="d-flex"></form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  @yield('content')
  <footer>
    <section>
      <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-xl-5 py-xl-0 mx-xl-5 px-xl-5 gy-md-4 gy-lg-5">
          <div class="col-xl-12">
            <div class="row">
              <div class="col-12 col-lg-4">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                  <img src="{{ asset('assets/frontend/img/logos/logo.svg') }}" alt="" class="img-fluid">
                </a>
              </div>
              <div class="col-12 col-lg-8">
                <div class="row">
                  <div class="col-12 col-md">
                    <ul class="list-group mt-3 mt-md-0 border-0">
                      <li class="list-group-item pb-1 border-0 fw-bold fs-16" aria-disabled="true">Pages</li>
                      <li class="list-group-item pb-0 border-0">
                        <a href="{{ route('homepage') }}" class="text-decoration-none color3">Home</a>
                      </li>
                      <li class="list-group-item pb-0 border-0">
                        <a href="{{ route('all.apis') }}" class="text-decoration-none color3">API</a>
                      </li>
                      <li class="list-group-item pb-0 border-0">
                        <a href="conatct-us" class="text-decoration-none color3">Support</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 col-md">
                    <ul class="list-group mt-3 mt-md-0 border-0">
                      <li class="list-group-item pb-1 border-0 fw-bold fs-16" aria-disabled="true">Other Products</li>
                      <li class="list-group-item pb-0 border-0">Jainam Duck</li>
                      <li class="list-group-item pb-0 border-0">Space</li>
                      <li class="list-group-item pb-0 border-0">Smartlearn</li>
                    </ul>
                  </div>
                  <div class="col-12 col-md">
                    <ul class="list-group mt-3 mt-md-0 border-0">
                      <li class="list-group-item pb-1 border-0 fw-bold fs-16" aria-disabled="true">Contact us</li>
                      <li class="list-group-item pb-0 border-0"><i class="fa-regular fa-envelope me-2"></i>customer.care@jainam.in</li>
                      <li class="list-group-item pb-0 border-0"><i class="fa-solid fa-phone me-2"></i>(0261) 6725555 / 2305555</li>
                      <li class="list-group-item pb-0 border-0">
                        <div class="d-flex">
                          <div class="me-3">
                            <a href="https://www.instagram.com/jainambroking/"><i class="fa-brands fs-3 color3 fa-instagram"></i></a>
                          </div>
                          <div class="me-3">
                            <a href="https://www.facebook.com/JainamBroking/"><i class="fa-brands fs-3 color3 fa-square-facebook"></i></a>
                          </div>
                          <div class="me-3">
                            <a href="https://www.youtube.com/channel/UC0_oYkIz8neLnVIjOuKgeSw"><i class="fa-brands fs-3 color3 fa-youtube"></i></a>
                          </div>
                          <div class="aa">
                            <a href="https://twitter.com/JAINAM_BROKING"><i class="fa-brands fs-3 color3 fa-x-twitter"></i></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row justify-content-betweeen gy-3 gy-md-0 mt-3 mt-md-0">
              <div class="col-md-6 col-lg-6 text-lg-start">
                <span class="footer-single-links">
                  © Copyright 2023. All rights reserved by <span class="fw-bold">Jainam Broking Limited</span>.
                </span>
              </div>
              <div class="col-md-6 col-lg-6 text-lg-end">
                <span class="footer-single-links">
                  Terms & Conditions | FAQs | Privacy Policy | Help
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </footer>
  @yield('after-footer-content')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
  <script>
    window.onscroll = function () {
  stickyNavbar();
};

function stickyNavbar() {
  const navbar = document.getElementById("myTopnav");
  const firstSection = document.getElementById("firstSection"); // Add an ID to your first section
  const sticky = navbar.offsetTop;

  if (window.pageYOffset > sticky) {
    navbar.classList.add("sticky");
    firstSection.style.marginTop = navbar.offsetHeight + "px";
  } else {
    navbar.classList.remove("sticky");
    firstSection.style.marginTop = 0;
  }
}
  </script>
  @yield('include-js')
</body>

</html>