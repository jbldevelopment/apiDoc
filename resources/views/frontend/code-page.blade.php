@extends('frontend.frontend-master')
@section('site-title')
    {{__($api_details->api_title)}}
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
<style>
    .bg-nav-section-color{
        background-color: #c5c5c5;
    }
    .bg-section-color{
        background: linear-gradient(
            to right,
            #FFFFFF 0%,
            #FFFFFF 58%,
            #000000 58%,
            #000000 59%,
            #263238 59%,
            #263238 100%
        );
    }
    .linkicon::before {
        content: "";
        width: 15px;
        height: 15px;
        background-size: contain;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeD0iMCIgeT0iMCIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cGF0aCBmaWxsPSIjMDEwMTAxIiBkPSJNNDU5LjcgMjMzLjRsLTkwLjUgOTAuNWMtNTAgNTAtMTMxIDUwLTE4MSAwIC03LjktNy44LTE0LTE2LjctMTkuNC0yNS44bDQyLjEtNDIuMWMyLTIgNC41LTMuMiA2LjgtNC41IDIuOSA5LjkgOCAxOS4zIDE1LjggMjcuMiAyNSAyNSA2NS42IDI0LjkgOTAuNSAwbDkwLjUtOTAuNWMyNS0yNSAyNS02NS42IDAtOTAuNSAtMjQuOS0yNS02NS41LTI1LTkwLjUgMGwtMzIuMiAzMi4yYy0yNi4xLTEwLjItNTQuMi0xMi45LTgxLjYtOC45bDY4LjYtNjguNmM1MC01MCAxMzEtNTAgMTgxIDBDNTA5LjYgMTAyLjMgNTA5LjYgMTgzLjQgNDU5LjcgMjMzLjR6TTIyMC4zIDM4Mi4ybC0zMi4yIDMyLjJjLTI1IDI0LjktNjUuNiAyNC45LTkwLjUgMCAtMjUtMjUtMjUtNjUuNiAwLTkwLjVsOTAuNS05MC41YzI1LTI1IDY1LjUtMjUgOTAuNSAwIDcuOCA3LjggMTIuOSAxNy4yIDE1LjggMjcuMSAyLjQtMS40IDQuOC0yLjUgNi44LTQuNWw0Mi4xLTQyYy01LjQtOS4yLTExLjYtMTgtMTkuNC0yNS44IC01MC01MC0xMzEtNTAtMTgxIDBsLTkwLjUgOTAuNWMtNTAgNTAtNTAgMTMxIDAgMTgxIDUwIDUwIDEzMSA1MCAxODEgMGw2OC42LTY4LjZDMjc0LjYgMzk1LjEgMjQ2LjQgMzkyLjMgMjIwLjMgMzgyLjJ6Ii8+PC9zdmc+Cg==);
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
</style>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 bg-nav-section-color">
                    <nav class="align-items-baseline bg-light h-100 navbar pt-lg-5">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item">
                                <a class="nav-link" href="#overview">Overview</a>
                            </li>
                            @foreach ($api_meta_list as $meta_key => $meta_details)
                            <li class="nav-item">
                                <a class="nav-link" href="#{{$meta_details->api_meta_slug}}">{{$meta_details->api_meta_title}}</a>
                            </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" href="#package">Pricing</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-10 bg-section-color">
                    <div class="row py-2" id="overview">
                        <div class="col-lg-7">
                            <div class="heading mb-3">
                                <h1 class="sc-htoDjs WxWXp fs-24">
                                    <a class="sc-VigVT linkicon" href="#overview">
                                    </a>
                                    {{$api_details->api_title}}
                                </h1>
                            </div>
                            <div class="body pl-4 text-justify fs-14">
                                {!!$api_details->api_description!!}
                            </div>
                        </div>
                        <div class="col-lg-5">
                            
                        </div>
                    </div>
                    @foreach ($api_meta_list as $meta_key => $meta_details)
                        <div class="row py-2" id="{{$meta_details->api_meta_slug}}">
                            <div class="col-lg-7">
                                <div class="heading mb-3">
                                    <h1 class="sc-htoDjs WxWXp fs-24">
                                        <a class="sc-VigVT linkicon" href="#{{$meta_details->api_meta_slug}}">
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
                                <figure class="block-code">
                                    <figcaption>{{$code_meta['api_code_title']}}</figcaption>
                                    <div id="api_code_details_{{$code_meta['api_code_id']}}" class="w-100 editors" style="padding: 10px;">{!!$code_meta['api_code']!!}</div>
                                </figure>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        // var elements = document.getElementsByTagName('div')
        // for (var i = 0; i < elements.length; i++) {
        //     var element = elements[i];

        //     // Check if the element is empty
        //     if (element.innerHTML.trim() === '') {
        //         console.log('element.id :>> ', element);
        //         // Remove the empty element
        //         // element.parentNode.removeChild(element);
        //     }
        // // }

        function removePaddingFromDivs(element, index) {
            var childNodes = element.childNodes;
            console.log('index :>> ', childNodes.length);
            for (var i = 0; i < childNodes.length; i++) {
                var childNode = childNodes[i];
                // console.log('childNode :>> ', childNode);
                if (childNode.hasOwnProperty("padding-left")) {
                    childNode.style["padding-left"] = '';
                }

                if (childNode.hasOwnProperty("padding-right")) {
                    childNode.style["padding-right"] = '';
                }
                if (childNode.hasOwnProperty("width")) {
                    childNode.style["width"] = '100%';
                }
                if (childNode.hasOwnProperty("border-top")) {
                    childNode.style["width"] = '100%';
                }
                try {
                    console.log('childNodes :>> ', childNodes.innerHTML.trim() === '');
                    if (childNodes.innerHTML.trim() === '') {
                        childNodes.parentNode.removeChild(childNodes);
                    }
                    removePaddingFromDivs(childNodes, index++);
                } catch (error) {
                    // console.log('error :>> ', error);
                }
            }
        }

        var parentElements = document.getElementsByClassName("body");
        for (var i = 0; i < parentElements.length; i++) {
            var parentElement = parentElements[i];
            removePaddingFromDivs(parentElement, 0);
        }
    </script>
<script>

    $('.editors').each(function (index, element) {
        var editor = ace.edit(element.id);
        editor.setTheme("ace/theme/tomorrow_night_bright");
        editor.getSession().setMode("ace/mode/javascript");
        editor.setReadOnly(true);
        editor.renderer.setShowGutter(false);
        // editor.getSession().clearAnnotations();
        editor.setOptions({
            maxLines: Infinity
        });
    });

    $('.nav-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });
</script>
@endsection
