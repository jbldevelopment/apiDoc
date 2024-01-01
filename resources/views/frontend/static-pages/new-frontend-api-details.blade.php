<!DOCTYPE html>
<html lang="en">

@extends('frontend.static-pages.new-frontend-master')
@section('site-title')
{{ 'ODIN API DETAILSvnc' }}
@endsection
@section('included-css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/new-detail-page.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/video.css') }}">
@endsection

@section('include-css')
    
@endsection
@section('content')
<!-- Header Section -->
<section id="firstSection">
    <div class="container-fluid py-4 py-lg-4 bg-color22">
        <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="text-start px-lg-5 mx-lg-5 px-0 mx-0 px-md-0 mx-md-0">
                    <div class="title text-white">ODIN API</div>
                    <div class="subTitle text-white">Start your own algorithm trading with our free Trading API
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tab Section -->
<section>
    <div class="container-fluid py-4 py-lg-4 py-md-4">
        <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row justify-content-center gy-lg-4 gy-4 gy-md-4">
                    <div class="col-12 col-lg-3 col-md-8">
                        <ul class="nav nav-underline nav-justified border-bottom border-color11" id="myTab"
                            role="tablist">
                            <li class="nav-item detail-nav-item" role="presentation">
                                <button class="nav-link detail-nav-link active" id="about-tab" data-bs-toggle="tab"
                                    data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                    aria-selected="true">About</button>
                            </li>
                            <li class="nav-item detail-nav-item" role="presentation">
                                <button class="nav-link detail-nav-link" id="tutorial-tab" data-bs-toggle="tab"
                                    data-bs-target="#tutorial" type="button" role="tab" aria-controls="tutorial"
                                    aria-selected="false">Tutorial</button>
                            </li>
                            <li class="nav-item detail-nav-item d-none" role="presentation">
                                <button class="nav-link detail-nav-link" id="pricing-tab" data-bs-toggle="tab"
                                    data-bs-target="#pricing" type="button" role="tab" aria-controls="pricing"
                                    aria-selected="false">Pricing</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- tab View Sections -->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
        <section>
            <div class="container-fluid py-2 px-0 py-lg-2 px-lg-0 py-md-2 px-md-0">
                <div class="row my-lg-0 pb-lg-3 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
                    <div class="col-12 mb-5 mb-lg-5 col-lg-12 mb-md-5 col-md-12">
                        <div
                            class="row justify-content-center gy-lg-5 px-lg-5 mx-lg-5 gy-5 px-0 mx-0 gy-md-5 px-md-0 mx-md-0">
                            <div class="col-lg-12 col-12 col-md-12">
                                <div class="about-text">
                                    Unlock the power of seamless stock market trading with Odin API. Designed for
                                    efficiency and reliability, Odin empowers developers with a robust platform,
                                    providing secure access to real-time market data, trade execution, and portfolio
                                    management. With comprehensive documentation and easy integration, Odin API
                                    streamlines the development process, allowing for swift deployment of trading
                                    strategies. Harness the potential of Odin to create innovative financial
                                    solutions
                                    and execute trades with precision, enabling users to navigate the complexities
                                    of
                                    the stock market effortlessly.
                                </div>
                            </div>
                            <div class="col-lg-5 col-12 col-md-10">
                                <div class="offer-box text-center py-lg-2 py-2 py-md-2">
                                    <div class="title color1 mb-lg-2 mb-2 mb-md-2 py-2 py-md-3">What We Offer:</div>
                                    <ul class="mx-lg-5 pb-lg-3 mx-2 pb-1 mx-md-5 pb-md-1">
                                        <li class="what-we-offer-li">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="width-80 list-title">Trading API</div>
                                                <a class="btn btn-jnm-outline-primary fs-14" href="https://online.jainam.in/doc.b2capi/">
                                                    View Documentation
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- choose our api section -->
        <section>
            <div class="container-fluid py-4 bg-color8">
                <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
                    <div class="col-12 my-5 col-lg-12 my-lg-5 ">
                        <div class="row gy-lg-5 px-lg-5 mx-lg-5 gy-5 px-0 mx-0 gx-0 gy-md-5 px-md-0 mx-md-0 gx-md-0">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="choose-api title">
                                    Why Choose Our APIs?
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 col-md-12">
                                <div class="row gx-0 gx-lg-5 gy-4 gx-md-5 justify-content-center">

                                    <div class="col-lg-4 col-12 col-md-11">
                                        <div class="card flex-row d-flex border-0 align-items-center h-100 h-lg-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/multi-language.svg') }}" alt="multi-language">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="choose-title pb-lg-1">Supprts Multiple Langauges</div>
                                                <div class="choose-sub-title">
                                                    Our API allows for easy integration with various programming languages such as Python, Java, PHP, C#, NodeJs, .NET, and C++, making it convenient for developers to incorporate our services into their applications.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 col-md-11">
                                        <div class="card flex-row d-flex border-0 align-items-center h-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/easy-to-use.svg') }}" alt="easy-to-use">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="choose-title pb-lg-1">Easy to Use</div>
                                                <div class="choose-sub-title">
                                                    Our APIs are user-friendly and designed for seamless integration into projects. We provide clear documentation and intuitive interfaces, making it easy for developers to use our APIs, regardless of their experience level.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 col-md-11">
                                        <div class="card flex-row d-flex border-0 align-items-center h-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/cloud-native.svg') }}" alt="cloud-native">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="choose-title pb-lg-1">Cloud Native</div>
                                                <div class="choose-sub-title">Our APIs are built with cloud-native
                                                    architecture, allowing for scalability and high availability.
                                                    They
                                                    leverage the power of cloud computing, enabling your
                                                    applications to
                                                    handle increased traffic and ensuring optimal performance.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 col-md-11">
                                        <div class="card flex-row d-flex border-0 align-items-center h-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/developer-friendly.svg') }}" alt="developer-friendly">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="choose-title pb-lg-1">Developer Friendly</div>
                                                <div class="choose-sub-title">
                                                    Our APIs prioritize the developer experience by offering comprehensive documentation, sample code, and SDKs in popular programming languages, making it simple and efficient for developers to get started and build applications quickly.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 col-md-11">
                                        <div class="card flex-row d-flex border-0 align-items-center h-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/update-support.svg') }}" alt="update-support">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="choose-title pb-lg-1">Updates and Support</div>
                                                <div class="choose-sub-title">
                                                    We continuously update and enhance our APIs based on customer feedback and provide dedicated support for any questions or issues you may have.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Supported Langauge Section -->
        <section>
            <div class="container-fluid py-4 py-lg-4 py-md-4">
                <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
                    <div class="col-12 my-5 col-lg-12 my-lg-5 col-md-12 my-md-5">
                        <div class="row gy-lg-5 px-lg-5 mx-lg-5 gy-5 px-0 mx-0 gy-md-5 px-md-0 mx-md-0">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="support-language title mb-lg-2 mb-3 mb-md-2">
                                    Supported Languages:
                                </div>
                                <div class="support-language sub-title">
                                    Diverse coding options: Python, JavaScript, Java, Ruby, and more! Empower your
                                    projects
                                    with our versatile language support.
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="row justify-content-center gy-4">
                                    <div class="col-lg col-6 col-md-3 tech-border-end mobile-tech tab-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/python.svg') }}" alt="python">
                                            <div class="language-text mt-3 mt-lg-3">
                                                Python
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3 col-lg col-6 col-md-3 tech-border-end no-mobile-tech tab-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/java.svg') }}" alt="java">
                                            <div class="language-text mt-3 mt-lg-3">
                                                Java
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3 tech-border-end tab-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/php.svg') }}" alt="php">
                                            <div class="language-text mt-3 mt-lg-3">
                                                PHP
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3 tech-border-end no-mobile-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/c-sharp.svg') }}" alt="c-sharp">
                                            <div class="language-text mt-3 mt-lg-3">
                                                C#
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3 tech-border-end mobile-tech tab-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/nord-js.svg') }}" alt="nord-js">
                                            <div class="language-text mt-3 mt-lg-3">
                                                NodeJs
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3 tech-border-end tab-tech no-mobile-tech">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/dot-net.svg') }}" alt="dot-net">
                                            <div class="language-text mt-3 mt-lg-3">
                                                .net
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg col-6 col-md-3">
                                        <div class="text-center mx-lg-3 mx-3 mx-md-3">
                                            <img src="{{ asset('assets/frontend/img/details-page/c-plus.svg') }}" alt="c-plus">
                                            <div class="language-text mt-3 mt-lg-3">
                                                C++
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- What are Features Section -->
        <section>
            <div class="container-fluid py-4 py-lg-4 py-md-4 bg-color8">
                <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
                    <div class="col-12 my-5 col-lg-12 my-lg-5 col-md-12 my-md-5">
                        <div class="row gy-lg-5 px-lg-5 mx-lg-5 gy-5 px-0 mx-0 gx-0 gy-md-5 px-md-0 mx-md-0 gx-md-0">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="choose-api title">
                                    What are the features?
                                </div>
                                <div class="support-language sub-title ">
                                    Unlock the Potential of Your Business with Our Powerful API Features Tailored for Unprecedented Success and Growth.
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="row gx-0 gx-lg-5 gy-4 gx-md-4">
                                    <div class="col-lg-3 col-12 col-md-6">
                                        <div class="card flex-column d-flex border-0 align-items-start h-100 py-3 py-lg-3 h-lg-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/free-cost.svg') }}" alt="free-cost">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="feature-title pb-lg-1">Free of cost</div>
                                                <div class="feature-sub-title">APIs allow systems and software
                                                    components
                                                    that are developed on separate platforms, with different
                                                    programming
                                                    languages, or on different devices to interact with one another.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12 col-md-6">
                                        <div class="card flex-column d-flex border-0 align-items-start h-100 py-3 py-lg-3 h-lg-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/interoperability.svg') }}" alt="Interoperability">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="feature-title pb-lg-1">Interoperability</div>
                                                <div class="feature-sub-title">APIs allow systems and software
                                                    components
                                                    that are developed on separate platforms, with different
                                                    programming
                                                    languages, or on different devices to interact with one another.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-12 col-md-6">
                                        <div class="card flex-column d-flex border-0 align-items-start h-100 py-3 py-lg-3 h-lg-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/adaptability.svg') }}" alt="adaptability">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="feature-title pb-lg-1">Adaptability</div>
                                                <div class="feature-sub-title">APIs offer a form of abstraction that
                                                    conceals the intricacy of the underlying system or service. This
                                                    implies
                                                    that developers can engage with a system without requiring, in
                                                    depth
                                                    knowledge of workings.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-12 col-md-6">
                                        <div class="card flex-column d-flex border-0 align-items-start h-100 py-3 py-lg-3 h-lg-100 rounded-3">
                                            <!-- Icon -->
                                            <div class="card-header bg-transparent border-0">
                                                <img src="{{ asset('assets/frontend/img/details-page/security.svg') }}" alt="security">
                                            </div>

                                            <!-- Text -->
                                            <div class="card-body">
                                                <div class="feature-title pb-lg-1">Security</div>
                                                <div class="feature-sub-title">To restrict access to the system's
                                                    features
                                                    and data and make sure that only approved users or apps are able
                                                    to
                                                    submit requests, APIs can be equipped with authentication and
                                                    authorization procedures.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="tab-pane fade" id="tutorial" role="tabpanel" aria-labelledby="tutorial-tab">
        <section>
            <div class="container-fluid py-2 px-0">
                <div class="row my-lg-0 pb-lg-3 mx-lg-5 px-lg-0 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
                    <div class="col-12">
                        <div class="row justify-content-center gy-lg-5 px-lg-5 mx-lg-5 gy-5 px-0 mx-0 gy-md-5 px-md-0 mx-md-0 text-center">
                            <div class="col-lg-12">
                                <div class="feature-title mt-lg-5">
                                    How To Use
                                </div>
                                <div class="feature-sub-title">
                                    We are strategists, designers and developers. Innovators and problem solvers. Small enough to be simple, quick and creative. 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="rounded-3 overflow-hidden">
                                    <video id="my-video" class="video-js" controls preload="auto" poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" data-setup='' loop>
                                        <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
                                        </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="tab-pane fade d-none" id="pricing" role="tabpanel" aria-labelledby="pricing-tab">
        <section>
            <div class="container-fluid py-2 px-0">
                <div class="row my-lg-0 pb-lg-3 mx-lg-5 px-lg-0">
                    <div class="col-12">
                        <div class="row justify-content-center gy-lg-5 px-lg-5 mx-lg-5">
                            <div class="col-lg-4">
                                <div class="card text-start p-2">
                                    <div class="card-header bg-transparent">
                                        <div class="row">
                                            <div class="col-7"></div>
                                            <div class="col-5">
                                                <div class="text-end">
                                                    <span class="populer-pricing-badge-success py-1 px-2 rounded-pill"><i class="fa-solid fa-fire-flame-curved me-2 text-danger"></i>Most popular</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="holder.js/100px180/" alt="Title" />
                                    <div class="card-body">
                                        <h4 class="card-title">Title</h4>
                                        <p class="card-text">Body</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://vjs.zencdn.net/5.4.6/video.js"></script>
@endsection
@section('after-footer-content')
  <section class="sticky-bottom sticky-md-bottom sticky-lg-bottom mt-auto py-3 bg-color1 shadow-lg">
    <div class="container-fluid">
        <div class="row my-lg-0 py-lg-0 mx-lg-5 px-lg-5 my-0 py-0 mx-0 px-0 my-md-0 py-md-0 mx-md-2 px-md-0">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="row align-items-center gy-md-0 gy-3 justify-content-center">
                    <div class="col-12 col-lg-10 col-md-7 color8 text-center text-md-start terms-condition">Read the <span class="text-light fw-bold">Terms and
                            Conditions</span>
                        before Buying</div>
                    <div class="col-12 col-lg-2 col-md-5 color8">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="d-flex d-md-block text-md-center text-start align-items-center">
                                    {{-- <div class="me-2 me-md-0 month-text">Monthly</div> --}}
                                    {{-- <div class="price-text">₹3,400</div> --}}
                                    <div class="price-text">Free</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="https://app-saas.odinconnector.co.in/market-place/api?redirect=c0FwcFRva2VuPUphaW5hbUJyb2tpbmdCMkMxMTgzODlhMGViYSZzVHdvV2F5VG9rZW49YWJjJnNQYXJ0bmVySWQ9MDRDMDM2JnNUZW5hbnRJZD01NA%3D%3D" class="btn btn-outline-light w-100">Get API</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
@section('include-js')
    
@endsection