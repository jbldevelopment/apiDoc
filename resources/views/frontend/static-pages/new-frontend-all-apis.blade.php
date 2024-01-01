@extends('frontend.static-pages.new-frontend-master')
@section('site-title')
{{ 'API List' }}
@endsection
@section('included-css')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/new-list.css') }}">
@endsection
@section('content')
<section class="" id="hero-sec">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-5">
            <div class="col-lg-12">
                <div class="sec-intro">
                    <div class="sec-intro-title mb-lg-">Catalog:</div>
                    <div class="sec-intro-sub-text text-justify">Developers can utilize well-documented APIs to obtain information about available endpoints, request parameters, and expected responses, among other things, to help them use the API efficiently.</div>
                </div>
            </div>
        </div>
        <div class="row my-5 py-0 px-0 px-md-3 my-md-5 my-lg-5 py-lg-0 mx-lg-5 px-lg-5">
            <div class="col-12 col-md-6 col-lg-6">
                <a class="text-decoration-none" href="{{ route('odin.api.detail') }}">
                <div class="card api-box-border py-2 h-100 flex-row rounded-4 api-box-shadow">
                    <div class="card-header pe-0 border-0 bg-transparent d-flex align-items-center">
                        <img src="{{ asset('assets/frontend/img/home/api-icon1.svg') }}" alt="" class="api-icon" height="64" width="64">
                    </div>
                    <div class="card-body pe-0 border-0">
                        <div class="api-title">Odin API</div>
                        <div class="api-text">Start your own algorithm trading with our free Trading API</div>
                    </div>
                    <div class="card-footer me-lg-2 bg-transparent border-0 d-flex align-items-center">
                        <div class="color1 fs-3">
                            <i class="fa-solid fa-chevron-right icon-chavron"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="bg-color8">
    <div class="container-fluid py-5">
        <div class="row my-2 py-0 px-0 px-md-3 my-lg-0 py-lg-0 mx-lg-5 px-lg-0 justify-content-center">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="row py-3 py-md-4 px-md-3 px-lg-5 py-lg-4 align-items-center justify-content-center gy-md-4 gy-lg-4">
                    <div class="col-12 col-md-12">
                        <div class="banner-title text-center mb-2 mb-lg-3 mb-md-2">
                            Create Your Duck Account today
                        </div>
                        <div class="banner-sub-text text-center">
                            Jainam's very own trading platform with 0 brokerage
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="text-center py-3 py-md-0">
                            <a href="https://jainam.in/Home/Index#open_an_account_home" class="btn btn-jnm-primary px-lg-3 py-lg-2 fs-16 text-nowrap">Sign-Up for Duck</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection