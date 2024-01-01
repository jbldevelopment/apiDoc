<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('site-title') | Jainam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/common.css') }}">
    @yield('included-css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/menu.css') }}">
</head>

<body>
    {!! new_render_frontend_menu($primary_menu) !!}

    @yield('content')
    <footer class="bg-color1">
        <div class="container-fluid pt-5">
            <div class="row pb-3 border-2 border-bottom px-lg-5 gy-lg-3">
                <div class="col-md-4">
                    <div class="pe-lg-5 pb-4 pb-lg-0">
                        <img class="img-fluid" src="{{ asset('assets/frontend/img/logos/logo.png') }}" alt="Logo" width="150" height="auto">
                    </div>
                    <div class="py-lg-3 pe-lg-5 text-white fs-6 pb-2 pb-lg-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus
                        scelerisque,
                        auctor laoreet urna varius.
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row py-3 py-lg-0">
                        {!! new_render_frontend_footer() !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border border-1 border-top"></div>
                </div>
                <div class="col-md-12">
                    <div class="row mt-lg-3">
                        <div class="col-md-8">
                            <small class="py-2 color2">
                                © Copyright 2023. All rights reserved by Jainam Broking Limited.
                            </small>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-lg-evenly justify-content-between">
                                <div>
                                    <small class="py-2">
                                        <a class="text-decoration-none color2" href="#">
                                            Terms & Conditions
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    <small class="py-2">
                                        <a class="text-decoration-none color2" href="#">
                                            FAQs
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    <small class="py-2">
                                        <a class="text-decoration-none color2" href="#">
                                            Privacy Policy
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    <small class="py-2">
                                        <a class="text-decoration-none color2" href="#">
                                            Help
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        //TOP NAVIGATION
        function NavBar() {
            var x = document.getElementById("myTopnav");
            if (x.className === "d-lg-flex align-items-center w-100 topnav") {
                x.className += " responsive d-block w-100";
            } else {
                x.className = "d-lg-flex align-items-center w-100 topnav";
            }
        }
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            var navbar = document.getElementById("navbar");
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.top = "0";
                //  navbar.classList.remove("mobile_scroll_nav");
                navbar.style.top = "0px";
            } else {
                navbar.classList.add("mobile_scroll_nav");
                navbar.style.top = "-100px";
            }
        }
    </script>
</body>

</html>
