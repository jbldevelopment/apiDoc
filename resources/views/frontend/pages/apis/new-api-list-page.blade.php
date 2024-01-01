@extends('frontend.new-frontend-master')
@section('site-title')
    {{ 'Home' }}
@endsection
@section('included-css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/category.css') }}">
@endsection
@section('content')
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
                            APIs
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
                        <div class="fs-1 text-center fw-semibold">APIs</div>
                    </div>
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb" class="nav_style">
                            <ol class="breadcrumb breadcrumb_style">
                                <li class="breadcrumb-item breadcrumb_item fw-semibold">
                                    <a href="#" class="breadcrumb_item_link">Home</a>
                                </li>
                                <li class="breadcrumb-item breadcrumb_item active fw-semibold" aria-current="page">
                                    APIs
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- nav buttons -->
            <div class="col-lg-12">
                <div class="">
                    <ul class="nav nav-tabs nav_tabs rounded-4" id="myTab" role="tablist">
                        @php $active = 0; @endphp
                        @foreach ($api_category_list as $key => $item)
                        <li class="nav-item nav_item" role="presentation">
                            <button class="nav-link nav_link {{ $active == 0 ? 'active' : '' }} border-0" id="{{$item->api_category_slug}}-tab" data-bs-toggle="tab" data-bs-target="#{{$item->api_category_slug}}" type="button" role="tab" aria-controls="{{$item->api_category_slug}}" aria-selected="true">
                                {{$item->api_category_title}}
                            </button>
                        </li>
                        @php $active++; @endphp
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- nav tabs -->
            <div class="col-lg-12">
                <div class="tab-content gx-2" id="myTabContent">
                    @php $active = 0; @endphp
                        @foreach ($api_category_list as $key => $item)
                            <div class="tab-pane fade {{ $active == 0 ? 'show active' : '' }} " id="{{$item->api_category_slug}}" role="tabpanel" aria-labelledby="{{$item->api_category_slug}}-tab">
                                <div class="row mt-lg-3 mb-lg-4">
                                    <div class="col-12">
                                        <div class="fs-6 py-3 fw-bold">
                                            {{$item->api_category_short_desc}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    @foreach ($item->cat_apis as $api_key => $api)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <a href="{{ route('frontend.dynamic.doc', ['slug' => $api['api_slug']]) }}" class="text-decoration-none">
                                                <div class="card p-2 p-lg-0">
                                                    <img src="{{ asset('storage/image/category/' . $item->api_bg_img_url) }}" class="rounded-top-1 card_cat_img img-fluid" alt="{{$item->api_bg_img_url}}">
                                                    <div class="card-header border-0 bg-transparent d-flex align-items-center justify-content-center py-2">
                                                        <div class="w-25 px-2">
                                                            <img src="{{ asset('assets/frontend/img/home/icon_developer.png') }}" class="img-fluid" alt="icon_developer.png">
                                                        </div>
                                                        <div class="w-75">
                                                            <span class="badge rounded-pill bg-color1 mt-2">Most Populer</span>
                                                            <span class="badge rounded-pill bg-{{$api['api_type'] ? 'color2':'color4'}} {{$api['api_type'] ? 'text-white':'color1'}} mt-2">{{$api['api_type'] ? 'Paid':'Free'}}</span>
                                                            <div class="fs-4 fw-semibold">{{ $api['api_title'] }}</div>
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
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @php $active++; @endphp
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