@extends('frontend.new-frontend-master')
@section('site-title')
{{ 'Home' }}
@endsection
@section('included-css')
<link rel="stylesheet" href="{{asset('assets/frontend/css/codeblock.css')}}">
@endsection
@section('content')
<style>
    .bg-nav-section-color{
        background-color: #c5c5c5;
    }
    .bg-section-color{
        background: linear-gradient(
            to right,
            #FFFFFF 0%,
            #FFFFFF 58%,
            #263238 58%,
            /* #263238 59%,
            #263238 59%, */
            #263238 100%
        );
    }
    .linkicon::before {
        content: "";
        width: 15px;
        height: 15px;
        background-size: contain;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeD0iMCIgeT0iMCIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBmaWxsPSIjMDEwMTAxIiBkPSJNNDU5LjcgMjMzLjRsLTkwLjUgOTAuNWMtNTAgNTAtMTMxIDUwLTE4MSAwIC03LjktNy44LTE0LTE2LjctMTkuNC0yNS44bDQyLjEtNDIuMWMyLTIgNC41LTMuMiA2LjgtNC41IDIuOSA5LjkgOCAxOS4zIDE1LjggMjcuMiAyNSAyNSA2NS42IDI0LjkgOTAuNSAwbDkwLjUtOTAuNWMyNS0yNSAyNS02NS42IDAtOTAuNSAtMjQuOS0yNS02NS41LTI1LTkwLjUgMGwtMzIuMiAzMi4yYy0yNi4xLTEwLjItNTQuMi0xMi45LTgxLjYtOC45bDY4LjYtNjguNmM1MC01MCAxMzEtNTAgMTgxIDBDNTA5LjYgMTAyLjMgNTA5LjYgMTgzLjQgNDU5LjcgMjMzLjR6TTIyMC4zIDM4Mi4ybC0zMi4yIDMyLjJjLTI1IDI0LjktNjUuNiAyNC45LTkwLjUgMCAtMjUtMjUtMjUtNjUuNiAwLTkwLjVsOTAuNS05MC41YzI1LTI1IDY1LjUtMjUgOTAuNSAwIDcuOCA3LjggMTIuOSAxNy4yIDE1LjggMjcuMSAyLjQtMS40IDQuOC0yLjUgNi44LTQuNWw0Mi4xLTQyYy01LjQtOS4yLTExLjYtMTgtMTkuNC0yNS44IC01MC01MC0xMzEtNTAtMTgxIDBsLTkwLjUgOTAuNWMtNTAgNTAtNTAgMTMxIDAgMTgxIDUwIDUwIDEzMSA1MCAxODEgMGw2OC42LTY4LjZDMjc0LjYgMzk1LjEgMjQ2LjQgMzkyLjMgMjIwLjMgMzgyLjJ6Ii8+PC9zdmc+Cg==) !important;
        opacity: 0.5;
        visibility: hidden;
        display: inline-block;
        vertical-align: middle;
    }
    
    table{
        width: 100% !important;
        border-collapse:collapse;
        border : 1px solid #000 !important;
    }
    .numbers{
        display: none;
    }
    .editor-container {
        /* height: 300px; */
        padding: 20px;
    }
    figure.block-code figcaption {
        color: #FFFFFF !important;
        background-color: #000 !important;
    }
    .ace_active-line {
        background-color: #000 !important;
    }

    @media (min-width: 0px) and (max-width: 767.98px) {
        .bg-section-color{
            background: none;
        }        
        .bg-section-color .col-lg-5{
            background: #263238;
        }        
    }
</style>

<!-- Page Wrapper -->
<div id="wrapper" class="position-relative">

    <!-- Sidebar -->
    <div class="text-center d-md-none mobile_button">
        <button class="rounded-circle border-0 mobile-sidebar sidebarToggle" id="mobileOpenSidebarToggle"></button>
    </div>
    <div class="text-center d-md-none mobile_button">
        <button class="rounded-circle border-0 mobile-sidebar sidebarToggle" id="mobileCloseSidebarToggle"></button>
    </div>
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Inroduction -->
        <li class="nav-item active">
            <a class="nav-link" href="#intro">
                <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                <span>Introduction</span>
            </a>
        </li>
        @foreach ($api_meta_list as $meta_key => $meta_details)
        @php
            $acordian_data = 'class="nav-link"' . 'href="#' . $meta_details->api_meta_slug . '"';
            if(count($meta_details->code_metas) > 0){
                $acordian_data = 'class="nav-link collapsed cp" data-toggle="collapse" data-target="#collapse-' . $meta_details->api_meta_slug .'" aria-expanded="true" aria-controls="collapse-' . $meta_details->api_meta_slug .'"';
            }
            @endphp
        <li class="nav-item">
            <a {!!$acordian_data!!}>
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <span>{{$meta_details->api_meta_title}}</span>
            </a>
            @if(count($meta_details->code_metas) > 0)
            <div id="collapse-{{$meta_details->api_meta_slug}}" class="collapse mx-2" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded overflow-x-hidden">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    @foreach ($meta_details->code_metas as $code_meta_key => $code_details)
                            <a class="collapse-item px-0" href="#code-{{$code_details['api_code_slug']}}">{{$code_details['api_code_title']}}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        </li>
        @endforeach
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid py-3">
                <!-- Page Heading -->
                <div class="d-flex align-items-center justify-content-between mb-4" id="intro">
                    <h1 class="h3 mb-0 text-gray-800">{{$api_details->api_title}}</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-md-10">
                        {!!$api_details->api_description!!}
                    </div>
                </div>
                    @foreach ($api_meta_list as $meta_key => $meta_details)
                        <div class="row py-2 border-top bg-section-color" id="{{$meta_details->api_meta_slug}}">
                            <div class="col-lg-7">
                                <div class="heading mb-3">
                                    <h1 class="fs-24">
                                        <a class="linkicon" href="#{{$meta_details->api_meta_slug}}">
                                        </a>
                                        {{$meta_details->api_meta_title}}
                                    </h1>
                                </div>
                                <div class="body pl-4 text-justify fs-14">
                                    {!!$meta_details->api_meta_descripetion!!}
                                </div>
                            </div>
                            <div class="col-lg-5">
                                @foreach ($meta_details->code_metas as $key => $code_meta)
                                <figure class="block-code" id="code-{{$code_meta['api_code_slug']}}">
                                    <figcaption>{{$code_meta['api_code_title']}}</figcaption>
                                    <div id="api_code_details_{{$code_meta['api_code_id']}}" class="w-100 editors" style="padding: 10px;">{!!$code_meta['api_code']!!}</div>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
            $("body").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");
            if ($(".sidebar").hasClass("toggled")) {
                $('.sidebar .collapse').collapse('hide');
            };
        });
        $(".nav-link").on('click', function(e) {
            let targeted_div = $(this).data('target');
            if ($(this).hasClass("collapsed")) {
                if ($(`${targeted_div}`).hasClass("show")) {
                    $(`${targeted_div}`).removeClass('show');
                } else {
                    $(this).removeClass('collapsed');
                    $('.collapse').removeClass('show');
                    $(`${targeted_div}`).addClass('show');
                }
            } else {
                $(`${targeted_div}`).removeClass('show');
                $(this).addClass('collapsed');
            }
        });
    });
    jQuery('.editors').each(function (index, element) {
        var editor = ace.edit(element.id);
        editor.setTheme("ace/theme/tomorrow_night_bright");
        editor.getSession().setMode("ace/mode/javascript");
        editor.setReadOnly(true);
        editor.renderer.setShowGutter(false);
        // editor.getSession().clearAnnotations();
        editor.setOptions({
            maxLines: Infinity
        });
        editor.getSession().setUseWrapMode(true);
    });

    jQuery('.nav-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            jQuery('html, body').animate({
                scrollTop: jQuery(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
    jQuery('#mobileOpenSidebarToggle').on('click', function(event) {
        jQuery('#wrapper').addClass('open');
    });
    jQuery('#mobileCloseSidebarToggle').on('click', function(event) {
        jQuery('#wrapper').removeClass('open');
    });
</script>
@endsection