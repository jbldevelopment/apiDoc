@extends('frontend.frontend-master')
@section('site-title')
    {{__($api_details->api_title)}}
@endsection
@section('content')
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
                                @foreach ($api_meta_list as $item) 
                                <figure class="block-code">
                                    <figcaption>myday.class.php</figcaption>
                                    <pre><code class="code-block" contenteditable="false" tabindex="0" spellcheck="false">{!!$item->api_meta_descripetion!!}</code></pre>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
