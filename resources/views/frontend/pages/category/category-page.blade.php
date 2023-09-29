@extends('frontend.frontend-master')
@section('site-title')
    {{__('Categories')}}
@endsection
@section('content')
<style>
    .block-code .numbers{
        display: none !important;
    }
</style>
<section class="breadcrumb-area breadcrumb-bg navbar-variant-01" style="background-image: url(http://127.0.0.1:8000/assets/uploads/media-uploader/011589562979.png);"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-lg-12"> 
                <div class="breadcrumb-inner"> 
                    <h1 class="page-title"> {{ __('API CATEGORY')}} </h1> 
                    <ul class="page-list"> 
                        <li><a href="http://127.0.0.1:8000">Home</a></li> 
                        <li> {{ __('API Category')}} </li> 
                    </ul> 
                </div> 
            </div> 
        </div> 
    </div> 
</section>
<section class="service-area service-page padding-120">
    <div class="container">
        <div class="row">
            @php $a = 1; @endphp
            @foreach ($api_category_list as $key => $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-what-we-cover-item-02 margin-bottom-30">
                    <div class="single-what-img">
                        <img src="http://127.0.0.1:8000/assets/uploads/media-uploader/161590862780.jpg" alt="">
                    </div>
                    <div class="icon-02 style-01">
                        <i class="{{$data->api_category_icon}}"></i>
                    </div>
                    <div class="content">
                        <a href="{{ route('frontend.dynamic.category', ['slug' => $data->api_category_slug]) }}"><h4 class="title">{{ $data->api_category_title }}</h4></a>
                        <p>{{$data->api_category_short_desc}}</p>
                    </div> 
                </div> 
            </div>
            @php
                if ($a == 4) {
                    $a = 1;
                } else {
                    $a++;
                }
            @endphp
        @endforeach
        </div>
    </div>
</section>
@endsection
