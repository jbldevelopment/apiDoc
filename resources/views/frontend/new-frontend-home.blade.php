@extends('frontend.new-frontend-master')
@section('content')
<!-- hero section -->
<section class="vh-75 bg-body-secondary">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="display-3 fw-semibold p-3 color5">APIs that are built for <span class="color2">
                        Developers</span></div>
                <div class="p-3 fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem
                    vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum.
                    Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien
                    non libero sollicitudin, et eleifend justo facilisis.
                </div>
                <div class="p-3">
                    <div class="fw-bold btn btn-jnm-primary px-lg-3 py-lg-2 fs-5">Sign Up</div>
                    <span class="color1 fw-bold mx-3">Or</span>
                    <div class="fw-bold btn btn-jnm-secondary px-lg-3 py-lg-2 fs-5">Sign In With Duck</div>
                </div>
            </div>
            <div class="col-md-6 bg-hero-section-img"></div>
        </div>
    </div>
</section>

<!-- categroy section -->
<section class="">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center color5">Categories</div>
                    </div>
                </div>
                <div class="row mb-lg-2">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-1.png') }}" class="card-img-top img-fluid" alt="cat-img-1.png">
                            <div class="card-body">
                                <div class="mt-2 mb-3 card-title display-6 fw-semibold color1">Developer APIs</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Nullam
                                            pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-2.png') }}" class="card-img-top img-fluid" alt="img-fluid">
                            <div class="card-body">
                                <div class="mt-2 mb-3 card-title display-6 fw-semibold color1">Connector APIs</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Nullam
                                            pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-3.png') }}" class="card-img-top img-fluid" alt="img-fluid">
                            <div class="card-body">
                                <div class="mt-2 mb-3 card-title display-6 fw-semibold color1">Partner APIs</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Nullam
                                            pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-jnm-third px-lg-3 py-lg-2 fs-5">View More</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- why choose us section -->
<section class="bg-color4">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center">Why Choose Us?</div>
                    </div>
                </div>
                <div class="row mb-lg-2 gy-5">
                    <!-- FIRST UAT -->
                    <div class="col-md-1">
                        <div class="position-relative h-100 d-flex align-items-center">
                            <div class="rectangle-box mx-auto"></div>
                            <div class="vertical-tb"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-2">
                            <div class="fs-2 fw-semibold">USP 1</div>
                        </div>
                        <div class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                            Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus
                            quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero
                            sollicitudin, et eleifend justo facilisis.
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <!-- END FIRST UAT -->
                    <!-- SECOND UAT -->
                    <div class="col-md-1">
                        <div class="position-relative h-100 d-flex align-items-center">
                            <div class="vertical-nobox"></div>
                            <div class="rectangle-circle"></div>
                            <div class="horizontal-ltr"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative h-100 d-flex align-items-center">
                            <div class="horizontal-nobox"></div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="position-relative h-100 d-flex align-items-center">
                            <div class="rectangle-box mx-auto"></div>
                            <div class="horizontal-rtl"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-2">
                            <div class="fs-2 fw-semibold">USP 2</div>
                        </div>
                        <div class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                            Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus
                            quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero
                            sollicitudin, et eleifend justo facilisis.
                        </div>
                    </div>
                    <!-- END SECOND UAT -->
                    <!-- THIRD UAT -->
                    <div class="col-md-1">
                        <div class="position-relative h-100 d-flex align-items-center">
                            <div class="rectangle-box mx-auto"></div>
                            <div class="vertical-bt"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="my-2">
                            <div class="fs-2 fw-semibold">USP 3</div>
                        </div>
                        <div class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                            Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus
                            quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero
                            sollicitudin, et eleifend justo facilisis.
                        </div>
                    </div>
                    <div class="col-md-5"></div>
                    <!-- END THIRD UAT -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- API section -->
<section class="">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center color5">APIs</div>
                    </div>
                </div>
                <div class="row mb-lg-2 g-3">
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-2">
                            <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                <div class="w-25 px-2">
                                    <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                </div>
                                <div class="w-75">
                                    <span class="badge rounded-pill text-bg-secondary mt-2">Category Tag</span>
                                    <div class="fs-4 fw-semibold">API Name</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="text-end mt-5 fs-3 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-jnm-third px-lg-3 py-lg-2 fs-5">View More</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- get started section -->
<section class="bg-color4 py-5">
    <div class="container text-center">
        <div class="display-5 fw-semibold color5 my-3">Get Started For Free</div>
        <div class="fs-5 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus
            scelerisque, auctor laoreet urna varius. </div>
        <div class="fw-bold btn btn-jnm-primary px-lg-3 py-lg-2 fs-5">Sign Up</div>
    </div>
</section>

<!-- blog section -->
<section class="">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center color5">Blogs</div>
                    </div>
                </div>
                <div class="row mb-lg-2">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-3.png') }}" class="card-img-top img-fluid" alt="img-fluid">
                            <div class="card-body">
                                <div class="mt-2 card-title display-6 fw-semibold color1">Blog Name</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">12th October 2023</div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end fs-5 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-3.png') }}" class="card-img-top img-fluid" alt="img-fluid">
                            <div class="card-body">
                                <div class="mt-2 card-title display-6 fw-semibold color1">Blog Name</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">12th October 2023</div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end fs-5 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/frontend/img/home/cat-img-3.png') }}" class="card-img-top img-fluid" alt="img-fluid">
                            <div class="card-body">
                                <div class="mt-2 card-title display-6 fw-semibold color1">Blog Name</div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="fs-6 card-text">12th October 2023</div>
                                    </div>
                                    <div class="col-2">
                                        <div class="text-end fs-5 fw-bold color1">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-jnm-third px-lg-3 py-lg-2 fs-5">View More</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ section -->
<section class="">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center color5">FAQs</div>
                    </div>
                </div>
                <div class="row mb-lg-2">
                    <div class="col-12">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="faq-accordion-item accordion-item my-3 overflow-hidden">
                                <h2 class="accordion-header" id="panelsStayOpen-heading1">
                                    <button class="faq-accordion-button accordion-button fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                                        Question 1
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading1">
                                    <div class="accordion-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero sollicitudin, et eleifend justo facilisis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-accordion-item accordion-item my-3 overflow-hidden">
                                <h2 class="accordion-header" id="panelsStayOpen-heading2">
                                    <button class="faq-accordion-button accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                        Question 2
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading2">
                                    <div class="accordion-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero sollicitudin, et eleifend justo facilisis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-accordion-item accordion-item my-3 overflow-hidden">
                                <h2 class="accordion-header" id="panelsStayOpen-heading3">
                                    <button class="faq-accordion-button accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="false" aria-controls="panelsStayOpen-collapse3">
                                        Question 3
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading3">
                                    <div class="accordion-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero sollicitudin, et eleifend justo facilisis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-accordion-item accordion-item my-3 overflow-hidden">
                                <h2 class="accordion-header" id="panelsStayOpen-heading4">
                                    <button class="faq-accordion-button accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4">
                                        Question 4
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading4">
                                    <div class="accordion-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero sollicitudin, et eleifend justo facilisis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="faq-accordion-item accordion-item my-3 overflow-hidden">
                                <h2 class="accordion-header" id="panelsStayOpen-heading5">
                                    <button class="faq-accordion-button accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="false" aria-controls="panelsStayOpen-collapse5">
                                        Question 5
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading5">
                                    <div class="accordion-body">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius. Sed fringilla vitae velit ac condimentum. Suspendisse potenti. Phasellus quis felis eu odio accumsan suscipit. Cras vulputate sapien non libero sollicitudin, et eleifend justo facilisis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-jnm-third px-lg-3 py-lg-2 fs-5">View More</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-color4">
    <div class="container py-5">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="display-5 fw-semibold text-center color5">Contact Us</div>
                    </div>
                </div>
                <div class="row mb-lg-2 justify-content-center">
                    <div class="col-9">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="bg-color1 text-white fw-bold w-25 border-2 border-color1 input-group-text" id="basic-addon1">First Name</span>
                                        <input type="text" class="form-control border-2 border-color1" id="first_name" name="first_name" placeholder="Divyesh, Karan" aria-label="first_name" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="bg-color1 text-white fw-bold w-25 border-2 border-color1 input-group-text" id="basic-addon1">Last Name</span>
                                        <input type="text" class="form-control border-2 border-color1" id="last_name" name="last_name" placeholder="Sarvaiya, Parmar" aria-label="last_name" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="bg-color1 text-white fw-bold w-25 border-2 border-color1 input-group-text" id="basic-addon1">Mobile No.</span>
                                        <input type="number" class="form-control border-2 border-color1" id="mobile_no" name="mobile_no" placeholder="84*****417" aria-label="mobile_no" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <span class="bg-color1 text-white fw-bold w-25 border-2 border-color1 input-group-text" id="basic-addon1">Email Id</span>
                                        <input type="email" class="form-control border-2 border-color1" id="email_id" name="email_id" placeholder="cast****@gmail.c**" aria-label="email_id" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <textarea class="form-control border-2 border-color1" id="message" name="message" rows="4" placeholder="Your Message?" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="fw-bold btn btn-jnm-primary px-lg-3 py-lg-2 fs-5">Submit</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="bg-color6">
    <div class="container-fluid pt-5">
        <div class="row pb-3 border-2 border-bottom">
            <div class="col-3">
                <div class="p-3">
                    <img class="img-fluid" src="{{ asset('assets/frontend/img/logos/logo.png') }}" alt="Logo" width="100" height="auto">
                </div>
                <div class="py-3 ps-3 pe-5 text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus scelerisque, auctor laoreet urna varius.
                </div>
            </div>
            <div class="col-6">
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
            <div class="col-3">
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
@endsection