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
<section class="what-we-cover bg-image padding-top-110 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center"> <div class="col-lg-8"> <div class="section-title white desktop-center margin-bottom-55"> <h3 class="title"> The API Suite </h3> <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. </p> </div> </div> </div>
        <div class="row">
            @php $a = 1; @endphp
                @foreach ($api_category_list as $key => $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-what-we-cover-item-02 margin-bottom-30">
                            <div class="single-what-img">
                                <img src="http://127.0.0.1:8000/assets/uploads/media-uploader/161590862780.jpg" alt="">
                            </div>
                            <div class="icon-02 style-01">
                                <i class="flaticon-cloud-2"></i>
                            </div>
                            <div class="content">
                                <a href="http://127.0.0.1:8000/service/cyber-security"><h4 class="title">Cyber Security</h4></a>
                                <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</p>
                            </div> 
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-6 d-none">
                        <div class="single-what-we-cover-item style-01 margin-bottom-30">
                            <div class="icon style-01"> 
                                <i class="{{$data->api_category_icon}}"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">
                                    <a href="{{ route('frontend.dynamic.category', ['slug' => $data->api_category_slug]) }}">{{ $data->api_category_title }}</a>
                                </h4>
                                <p class="fs-14 fw-700">{{$data->api_category_short_desc}}</p>
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
