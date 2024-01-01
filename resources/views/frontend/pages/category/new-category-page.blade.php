@extends('frontend.new-frontend-master')
@section('site-title')
    {{ 'Home' }}
@endsection
@section('included-css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/category.css') }}">
@endsection
@section('content')
<!-- get started section -->
<section class="bg-color1 py-2">
    <div class="container text-start text-white my-5 my-lg-0">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="nav_style">
                    <ol class="breadcrumb breadcrumb_style my-2">
                        <li class="breadcrumb-item breadcrumb_item">
                            <a href="#" class="breadcrumb_item_link">Home</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb_item active" aria-current="page">
                            Categories
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- category section -->
<section class="py-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row gx-lg-0">
                    <div class="col-lg-12">
                        <div class="fs-1 text-center fw-semibold">Categories</div>
                        <div class="fs-6 py-3 fw-bold text-center">
                            APIs to facilitate creation of web & mobile trading apps.
                        </div>
                    </div>
                </div>
            </div>
            <!-- nav tabs -->
            <div class="col-lg-12">
                <div class="row mt-lg-3 mb-lg-4 g-3">
                    @foreach ($api_category_list as $key => $categ)
                            <div class="col-md-4">
                                <a href="{{ route('frontend.dynamic.category', ['slug' => $categ->api_category_slug]) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('storage/image/category/' . $categ->api_bg_img_url) }}"
                                    class="rounded-top-1 card_cat_img img-fluid" alt="{{$categ->api_bg_img_url}}">
                                        <div class="card-body">
                                            <div class="mt-2 mb-3 card-title display-6 fw-semibold color1">{{ $categ->api_category_title }}</div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="fs-6 card-text">{{ $categ->api_category_short_desc }}</div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="text-end mt-5 fs-3 fw-bold color1">
                                                        <i class="fa-solid fa-chevron-right"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>    
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- get started section -->
<section class="bg-color6 py-5">
    <div class="container text-center text-white my-5 my-lg-0">
        <div class="display-5 fw-semibold my-3">Get Started For Free</div>
        <div class="fs-5 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pulvinar sem vel purus
            scelerisque, auctor laoreet urna varius. </div>
        <div class="fw-bold btn btn-jnm-secondary px-lg-3 py-lg-2 fs-5">Sign Up</div>
    </div>
</section>
@endsection