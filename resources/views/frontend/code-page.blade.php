@extends('frontend.frontend-master')
@section('site-title')
    {{__($api_details->api_title)}}
@endsection
@section('content')
<style>
    .block-code .numbers{
        display: none !important;
    }
</style>
    <section class="">
        <div class="container-fluid">
            <div class="row h-100">
                <div class="col-lg-2 pl-lg-0">
                    <nav class="align-items-baseline bg-light h-100 navbar pt-lg-5">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item">
                                <a class="nav-link" href="#overview">Overview</a>
                            </li>
                            @foreach ($api_meta_list as $item) 
                            <li class="nav-item">
                                <a class="nav-link" href="#{{$item->api_meta_slug}}">{{$item->api_meta_title}}</a>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="package">Overview</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-10 px-lg-0">
                    <div class="row h-100">
                        <div class="col-lg-7 pt-5">
                            <div id="overview">
                                <h2>{{$api_details->api_title}}</h2>
                                <p>{!!$api_details->api_description!!}</p>
                            </div>
                            @foreach ($api_meta_list as $item) 
                                <div id="{{$item->api_meta_slug}}">
                                    <h2>{{$item->api_meta_title}}</h2>
                                    <p>{!!$item->api_meta_descripetion!!}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-5 bg-dark pt-lg-5">
                            <div>
                                @php
                                    $technologies_code = [];
                                    $active = 1;
                                    $show_active = 1;
                                @endphp
                                @foreach ($api_code_meta_list as $code) 
                                    @php
                                        $technologies_code['tech_' . $code->api_technology][] = $code;
                                        @endphp
                                @endforeach
                                <ul class="nav nav-tabs justify-content-center mr-lg-3" id="myTabs" role="tablist">
                                    @foreach ($technlogies as $links)
                                    <li class="nav-item">
                                        <a class="nav-link {{($active == 1) ? 'active' : ''}}" id="{{$links->technolgy_slug}}-tab" data-toggle="tab" href="#{{$links->technolgy_slug}}" role="tab" aria-controls="{{$links->technolgy_slug}}" aria-selected="true">{{$links->technolgy_slug}}</a>
                                    </li>
                                        @php
                                            $active = 0;
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content mr-lg-3" id="myTabContent">
                                    @foreach ($technlogies as $item)
                                    <div class="tab-pane fade {{($show_active == 1) ? 'show active' : ''}}" id="{{$item->technolgy_slug}}" role="tabpanel" aria-labelledby="{{$item->technolgy_slug}}-tab">
                                        @foreach ($technologies_code as $keys => $codes )
                                            @if ('tech_' . $item->technolgy_id == $keys)
                                                @foreach ($codes as $keys => $data )
                                                <figure class="block-code">
                                                    <figcaption>{{$data['api_code_title']}}</figcaption>
                                                    <pre><code class="code-block" contenteditable="false" tabindex="0" spellcheck="false" style="text-wrap: pretty;">{!!$data['api_code']!!}</code></pre>
                                                </figure>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    @php
                                        $show_active = 0;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-5"> 
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Pricing</h1>
                <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
              </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="price-plan-slider global-carousel-init" data-loop="true" data-desktopitem="3" data-mobileitem="1" data-tabletitem="2" data-nav="true" data-autoplay="true" data-margin="30">
                        @foreach ($all_package as $data)
                            <div class="single-price-plan-01 style-02">
                                <div class="price-header">
                                    <div class="name-box">
                                        <h4 class="name">{{ $data->api_plan_title }}</h4>
                                    </div>
                                    <div class="price-wrap">
                                        @if ($data->api_plan_discounted_price > 0)
                                            <div class="price">{{ amount_with_currency_symbol($data->api_plan_discounted_price) }}</div><span class="month">{{ $data->type }}</span>
                                            <div class="price fs-22 mt-0"><del>{{ amount_with_currency_symbol($data->api_plan_regular_price) }}</div><span class="month">{{ $data->type }}</del></span>
                                        @else
                                            <span class="price">{{ amount_with_currency_symbol($data->api_plan_regular_price) }}</span><span class="month">{{ $data->type }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        @php
                                            $features = explode(",", $data->api_plan_descripetion);
                                        @endphp
                                        @foreach ($features as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="btn-wrapper">
                                    @php
                                        $url = !empty($data->url_status) ? route('frontend.plan.order', ['id' => $data->id]) : $data->btn_url;
                                    @endphp
                                    <a href="{{ $url }}" rel="canonical" class="boxed-btn">{{ $data->api_discounted_off_text }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
