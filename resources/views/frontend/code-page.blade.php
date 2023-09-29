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
                                <a class="nav-link" href="#package">Pricing</a>
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
    <section class="py-5" id="package">
        <div class="container py-5"> 
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Pricing</h1>
                <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
              </div>
            <div class="row">
                <div class="col-lg-12 px-0">
                    {{-- <div class="container"> --}}
                        <div class="owl-carousel">
                            @foreach ($all_package as $data)
                                <div class="item text-center h-100">
                                    <div class="card mb-2 box-shadow h-100">
                                        <div class="card-header">
                                            <h4 class="my-0 font-weight-normal">{{ $data->api_plan_title }}</h4>
                                        </div>
                                        <div class="card-body">
                                            @if ($data->api_plan_discounted_price > 0)
                                                <div class="card-title pricing-card-title fs-24 text-dark fw-900">{{ amount_with_currency_symbol($data->api_plan_discounted_price) }} <small class="text-muted text-dark fw-900">/ mo</small></div>
                                                <div class="card-title pricing-card-title fs-18"><del>{{ amount_with_currency_symbol($data->api_plan_regular_price) }} <small class="text-muted">/ mo</small></del></div>
                                                @else
                                                <div class="card-title pricing-card-title fs-24 text-dark fw-900">{{ amount_with_currency_symbol($data->api_plan_regular_price) }} <small class="text-muted text-dark fw-900">/ mo</small></div>
                                                <div class="card-title pricing-card-title fs-18" style="color: transparent">0</div>
                                            @endif
                                            <div class="alert alert-success justify-content-center fw-800" role="alert">
                                                @if ($data->api_plan_discounted_price > 0)
                                                    {{ $data->api_discounted_off_text }}
                                                @else
                                                    {{ 'Hurry Up Now' }}
                                                @endif
                                            </div>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                @php
                                                    $features = explode(",", $data->api_plan_descripetion);
                                                @endphp
                                                @foreach ($features as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>

                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          <!-- Add more slides as needed -->
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
          $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            // responsive: {
            //   0: {
            //     items: 1,
            //   },
            //   768: {
            //     items: 2,
            //   },
            //   992: {
            //     items: 3,
            //   },
            // },
            autoplay: true,
            autoplayTimeout: 3000,
          });
        });
      </script>
      
@endsection
