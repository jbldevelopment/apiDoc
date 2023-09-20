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
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link 1</a>
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
                        </div>
                        <div class="col-lg-5 bg-dark pt-lg-5">
                            <div>
                                <h3>code block</h3>
                                <code>curl --request POST \
                                    --url https://control.msg91.com/api/v5/flow/ \
                                    --header 'accept: application/json' \
                                    --header 'authkey: Enter your MSG91 authkey' \
                                    --header 'content-type: application/json' \
                                    --data '
                                    {
                                    "template_id": "EntertemplateID",
                                    "short_url": "1 (On) or 0 (Off)",
                                    "recipients": [
                                    {
                                    "mobiles": "919XXXXXXXXX",
                                    "VAR1": "VALUE1",
                                    "VAR2": "VALUE2"
                                    }
                                    ]
                                    }</code>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
