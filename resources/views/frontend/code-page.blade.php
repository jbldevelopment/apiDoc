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
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                    @foreach ($technlogies as $links)
                                    <li class="nav-item">
                                        <a class="nav-link {{($active == 1) ? 'active' : ''}}" id="{{$links->technolgy_slug}}-tab" data-toggle="tab" href="#{{$links->technolgy_slug}}" role="tab" aria-controls="{{$links->technolgy_slug}}" aria-selected="true">{{$links->technolgy_slug}}</a>
                                    </li>
                                        @php
                                            $active = 0;
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($technlogies as $item)
                                    <div class="tab-pane fade {{($show_active == 1) ? 'show active' : ''}}" id="{{$item->technolgy_slug}}" role="tabpanel" aria-labelledby="{{$item->technolgy_slug}}-tab">
                                        @foreach ($technologies_code as $keys => $codes )
                                            @if ('tech_' . $item->technolgy_id == $keys)
                                                @foreach ($codes as $keys => $data )
                                                <figure class="block-code">
                                                    <figcaption>{{$data['api_code_title']}}</figcaption>
                                                    <pre><code class="code-block" contenteditable="false" tabindex="0" spellcheck="false">{!!$data['api_code']!!}</code></pre>
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
@endsection
