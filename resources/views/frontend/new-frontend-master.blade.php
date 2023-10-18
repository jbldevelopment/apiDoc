<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/new-style-two.css') }}">
</head>

<body>
    {!! new_render_frontend_menu($primary_menu) !!}

    @yield('content')

    <footer class="bg-color6">
        <div class="container-fluid pt-5">
            <div class="row pb-3 border-2 border-bottom">
                <div class="col-md-3">
                    <div class="p-3">
                        <img class="img-fluid" src="{{ asset('assets/frontend/img/logos/logo.png') }}" alt="Logo"
                            width="100" height="auto">
                    </div>
                    <div class="py-3 ps-3 pe-5 text-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus
                        scelerisque,
                        auctor laoreet urna varius.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row py-3">
                        <div class="col-md-4">
                            <div class="fs-4 color4 pb-2 border-bottom mb-2 fw-semibold">Pages</div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Home</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Categories</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">APIs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="fs-4 color4 pb-2 border-bottom mb-2 fw-semibold">Categories</div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Category 1</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Category 2</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Category 3</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="fs-4 color4 pb-2 border-bottom mb-2 fw-semibold">Company</div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-decoration-none text-white" href="#">About Us</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Contact</a>
                                </li>
                                <li>
                                    <a class="text-decoration-none text-white" href="#">Blogs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="fs-4 text-white pb-2 mb-2 fw-semibold">Contact Us</div>
                        <div class="mb-2 text-white fw-semibold">support@smartlearn.com</div>
                        <div class="mb-2 text-white fw-semibold">+91 98765 43210</div>
                        <div class="d-flex fs-4 justify-content-between w-50 align-items-center">
                            <div class="color2">
                                <i class="fa-brands fa-linkedin"></i>
                            </div>
                            <div class="color2">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                            <div class="color2">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                            <div class="color2">
                                <i class="fa-brands fa-x-twitter"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-1 border-2 border-bottom">
                <div class="col-md-6">
                    <small class="py-2 color2">
                        © Copyright 2023. All rights reserved by Jainam Broking Limited.
                    </small>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-evenly">
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
    </footer>
    <script>
        //TOP NAVIGATION
        function NavBar() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
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
