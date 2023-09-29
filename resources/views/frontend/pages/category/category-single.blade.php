@extends('frontend.frontend-page-master')
@section('page-title')
{{$api_category_details->api_category_title}}
@endsection
@section('content')
<div class="page-content service-details padding-top-120 padding-bottom-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-item">
                    <div class="thumb margin-bottom-40">
                        <img src="http://localhost:8000/assets/uploads/media-uploader/161590862780.jpg" alt="">
                    </div>
                    <div class="service-description">
                        <div>
                            {{ $api_category_details->api_category_short_desc }}
                        </div>
                        <div>
                            {!! $api_category_details->api_category_descripetion !!}
                        </div>
                    </div>
                    <div class="price-plan-wrapper margin-top-40">
                        <div class="row">
                            @php $a = 1; @endphp
                            @foreach ($api_list as $key => $data)
                            <div class="col-lg-6 col-md-6">
                                <div class="single-what-we-cover-item-02 h-100">
                                    <div class="single-what-img">
                                        <img src="http://127.0.0.1:8000/assets/uploads/media-uploader/161590862780.jpg" alt="">
                                    </div>
                                    <div class="align-items-baseline content d-flex h-100 justify-content-center">
                                        <a href="{{ route('frontend.dynamic.doc', ['slug' => $data->api_slug]) }}">
                                            <h4 class="title">{{ $data->api_title }}</h4>
                                        </a>
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
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="widget-nav-menu margin-bottom-30 service-category sidebars-single-content">
                        <ul>
                            <li>
                                <a href="http://localhost:8000/service/category/4/mobile-apps" class="service-widget ">
                                    <div class="service-title">
                                        <h6 class="title">Mobile Apps</h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost:8000/service/category/3/uxui-design" class="service-widget ">
                                    <div class="service-title">
                                        <h6 class="title">UX/UI Design</h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost:8000/service/category/2/web-developer" class="service-widget active">
                                    <div class="service-title">
                                        <h6 class="title">Web Developer</h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost:8000/service/category/1/web-design" class="service-widget ">
                                    <div class="service-title">
                                        <h6 class="title">Web Design</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="no-padding-border service-widget widget">
                        <div class="attorney-contact-form-wrap">
                            <h3 class="title">Have Query ?</h3>
                            <div class="attorney-contact-form">
                                <form action="http://localhost:8000/submit-custom-form" method="post" id="custom_form_builder_qLBQNFTqxi" class="custom-form-builder-form " enctype="multipart/form-data">
                                    <input type="hidden" name="custom_form_id" value="1">
                                    <input type="hidden" name="captcha_token" id="gcaptcha_token">
                                    <div class="error-message"></div>
                                    <div class="form-group"><label for="your-name">Your Name</label>
                                        <input type="text" id="your-name" name="your-name" class="form-control" placeholder="Your Name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="your-email">Your Email</label>
                                        <input type="email" id="your-email" name="your-email" class="form-control" placeholder="Your Email" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="your-phone">Your Phone</label>
                                        <input type="tel" id="your-phone" name="your-phone" class="form-control" placeholder="Your Phone">
                                    </div>
                                    <div class="form-group textarea"><label for="your-message">Your Message</label>
                                        <textarea name="your-message" id="your-message" cols="30" rows="5" class="form-control" placeholder="Your Message" required="required"></textarea>
                                    </div>
                                    <div class="btn-wrapper">
                                        <button type="submit" class="submit-btn custom_submit_form_button submit-btn">Submit Request</button>
                                        <div class="ajax-loading-wrap hide">
                                            <div class="sk-fading-circle">
                                                <div class="sk-circle1 sk-circle"></div>
                                                <div class="sk-circle2 sk-circle"></div>
                                                <div class="sk-circle3 sk-circle"></div>
                                                <div class="sk-circle4 sk-circle"></div>
                                                <div class="sk-circle5 sk-circle"></div>
                                                <div class="sk-circle6 sk-circle"></div>
                                                <div class="sk-circle7 sk-circle"></div>
                                                <div class="sk-circle8 sk-circle"></div>
                                                <div class="sk-circle9 sk-circle"></div>
                                                <div class="sk-circle10 sk-circle"></div>
                                                <div class="sk-circle11 sk-circle"></div>
                                                <div class="sk-circle12 sk-circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection