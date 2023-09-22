@extends('backend.admin-master')
@section('style')
@include('backend.partials.media-upload.style')
<link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
@endsection
@section('site-title')
{{ __('Edit API') }}
@endsection
@section('content')
<section class="bg-dark h-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 pl-lg-0">
                <nav class="align-items-baseline bg-secondary h-100 navbar">
                    <ul class="navbar-nav w-100 navigation-slug-tag-html">
                        @foreach ($api_meta_list as $item) 
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#{{$item->api_meta_slug}}">{{$item->api_meta_title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-10 px-lg-0">
                <div class="row h-100 border-bottom border-top ">
                    <div class="col-lg-7 pt-lg-2 doc-meta-details border-right">
                        <form action="{{ route('api.meta.add') }}" method="post" enctype="multipart/form-data" id="meta_form_data">
                            @csrf
                            <div id="accordion">
                                @foreach ($api_meta_list as $item)                           
                                <div class="card my-lg-2 border-dark card_index" id="{{$item->api_meta_slug}}">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white title_{{$item->api_meta_id}}">
                                                {{$item->api_meta_title}}
                                            </div>
                                            <div>
                                                <div class="btn btn-primary submit-meta-details" data-index-id="{{$item->api_meta_id}}" data-index-action="update">{{ __('Change') }}</div>
                                                <div class="btn btn-outline-info" data-toggle="collapse" data-target="#api_meta_details_{{$item->api_meta_id}}" aria-expanded="true" aria-controls="api_meta_details_{{$item->api_meta_id}}">
                                                    <i class="ti-angle-down"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="api_meta_details_{{$item->api_meta_id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col mt-lg-1-lg-6">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }}</label>
                                                        <input type="hidden" class="form-control" id="api_id_{{$item->api_meta_id}}" name="api_id[]" value="{{$api_details->api_id}}">
                                                        <input type="hidden" class="form-control" id="api_meta_id_{{$item->api_meta_id}}" name="api_meta_id[]" value="{{$item->api_meta_id}}">
                                                        <input type="text" class="form-control title-input" data-title-id="#title_{{$item->api_meta_id}}" data-slug-id="#api_slug_{{$item->api_meta_id}}" id="api_title_{{$item->api_meta_id}}" value="{{$item->api_meta_title}}" name="api_title[]" placeholder="{{ __('Title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }}</label>
                                                        <input type="text" class="form-control" id="api_slug_{{$item->api_meta_id}}" value="{{$item->api_meta_slug}}" name="api_slug[]" placeholder="{{ __('slug') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-1">
                                                    <div class="form-group mb-lg-2 classic-editor-wrapper">
                                                        <label>{{ __('Decription') }}</label>
                                                        <input type="hidden" id="api_description_{{$item->api_meta_id}}" name="api_description[]">
                                                        <div class="summernote" data-content='{{$item->api_meta_descripetion}}'></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Meta version') }}</label>
                                                        <input type="text" class="form-control" id="meta_version_{{$item->api_meta_id}}" value="{{$item->api_meta_version}}" name="meta_version[]" placeholder="{{ __('https://github.com/') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }}</label>
                                                        <input type="number" class="form-control" id="api_order_{{$item->api_meta_id}}" value="{{$item->api_meta_order}}" name="api_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }}</label>
                                                        <select name="api_status[]" id="api_status_{{$item->api_meta_id}}" class="form-control">
                                                            <option {{ ($item->api_meta_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                                            <option {{ ($item->api_meta_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Source Code Link') }}</label>
                                                        <input type="text" class="form-control" id="api_link_{{$item->api_meta_id}}" value="{{$item->api_meta_link}}" name="api_link[]" placeholder="{{ __('https://github.com/') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="card my-lg-2 border-dark card_index">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white" id="title_0">
                                                Title To Show
                                            </div>
                                            <div>
                                                <div class="btn btn-primary submit-meta-details" data-index-id="0" data-index-action="save">{{ __('Save') }}</div>
                                                <div class="btn btn-outline-info" data-toggle="collapse" data-target="#api_meta_details_0" aria-expanded="true" aria-controls="api_meta_details_0">
                                                    <i class="ti-angle-down"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="api_meta_details_0" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col mt-lg-1-lg-6">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }}</label>
                                                        <input type="hidden" class="form-control" id="api_id_0" name="api_id[]" value="{{$api_details->api_id}}">
                                                        <input type="hidden" class="form-control" id="api_meta_id_0" name="api_meta_id[]" value="{{$api_details->api_id}}">
                                                        <input type="text" class="form-control title-input" data-title-id="#title_0" data-slug-id="#api_slug_0" id="api_title_0" name="api_title[]" placeholder="{{ __('Title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }}</label>
                                                        <input type="text" class="form-control" id="api_slug_0" name="api_slug[]" placeholder="{{ __('slug') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-1">
                                                    <div class="form-group mb-lg-2 classic-editor-wrapper">
                                                        <label>{{ __('Decription') }}</label>
                                                        <input type="hidden" id="api_description_0" name="api_description[]">
                                                        <div class="summernote" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Meta version') }}</label>
                                                        <input type="text" class="form-control" id="meta_version_0" name="meta_version[]" placeholder="{{ __('https://github.com/') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }}</label>
                                                        <input type="number" class="form-control" id="api_order_0" name="api_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }}</label>
                                                        <select name="api_status[]" id="api_status_0" class="form-control">
                                                            <option value="0">{{ __('Deactive') }}</option>
                                                            <option value="1">{{ __('Active') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Source Code Link') }}</label>
                                                        <input type="text" class="form-control" id="api_link_0" name="api_link[]" placeholder="{{ __('https://github.com/') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                    <div class="col-lg-5 pt-lg-2 bg-dark text-white">
                        <form action="{{ route('api.meta.add') }}" method="post" enctype="multipart/form-data" id="code_form_data">
                            @csrf
                            <div id="accordion-2">
                                @foreach ($api_meta_list as $item)
                                @endforeach
                                <div class="card my-lg-2 border-dark card_index">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white" id="code_title_0">
                                                Page / Code Title
                                            </div>
                                            <div>
                                                <div class="btn btn-primary submit-code-details" data-index-id="0" data-index-action="save">{{ __('Save') }}</div>
                                                <div class="btn btn-outline-info" data-toggle="collapse" data-target="#code_meta_0" aria-expanded="true" aria-controls="code_meta_0">
                                                    <i class="ti-angle-down"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="code_meta_0" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-2">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col mt-lg-1-lg-6">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }}</label>
                                                        <input type="text" class="form-control title-input" data-title-id="#code_title_0" data-slug-id="#api_code_slug_0" id="api_code_title_0" name="api_code_title[]" placeholder="{{ __('Title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }}</label>
                                                        <input type="text" class="form-control" id="api_code_slug_0" name="api_code_slug[]" placeholder="{{ __('slug') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-1">
                                                    <div class="form-group mb-lg-2 classic-editor-wrapper">
                                                        <label>{{ __('Code') }}</label>
                                                        <input type="hidden" id="api_code_0" name="api_code[]">
                                                        <div class="summernote" ></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('API Meta') }}</label>
                                                        <select id="api_meta_id_0" name="api_meta_id[]" class="form-control">
                                                            <option>{{ __('Please Select Api') }}</option>
                                                            @foreach ($api_meta_list as $item)
                                                                <option value="{{$item->api_meta_id}}">{{$item->api_meta_title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Technology') }}</label>
                                                        <select name="api_technology[]" id="api_technology_0" class="form-control">
                                                            <option value="1">{{ __('PHP') }}</option>
                                                            <option value="2">{{ __('PYTHON') }}</option>
                                                            <option value="3">{{ __('NODE') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }}</label>
                                                        <input type="number" class="form-control" id="api_code_order_0" name="api_code_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }}</label>
                                                        <select name="api_code_status[]" id="api_code_status_0" class="form-control">
                                                            <option value="0">{{ __('Deactive') }}</option>
                                                            <option value="1">{{ __('Active') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
<x-backend.auto-slug-js :url="route('admin.page.slug.check')" :type="'update'" />
<script>
    $(document).ready(function() {
        $("form").submit(function(e){
            e.preventDefault();
        });
        $('.summernote').summernote({
            height: 200,
            codemirror: {
                theme: 'monokai'
            },
            callbacks: {
                onChange: function(contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });
        if ($('.summernote').length > 0) {
            $('.summernote').each(function(index, value) {
                $(this).summernote('code', $(this).data('content'));
            });
        }
        $('#toggleCode').click(function () {
                                            $('.code-block').toggle();
                                        });
    });
    $('#add-new-section').click(function(e) {
        e.preventDefault();
        let html = `<li class="nav-item">
                            <a class="nav-link text-white" href="#">Link 2</a>
                        </li>`
        $('.navigation-slug-tag-html').append(html);
    });
    $('.submit-meta-details').click(function(e) {
        e.preventDefault();
        let submit_url = $('#meta_form_data').attr('action');
        let data_index = $(this).data('index-id');
        let index_action = $(this).data('index-action');

        let api_id = $(`#api_id_${data_index}`).val();
        let api_title = $(`#api_title_${data_index}`).val();
        let api_slug = $(`#api_slug_${data_index}`).val();
        let api_description = $(`#api_description_${data_index}`).val();
        let meta_version = $(`#meta_version_${data_index}`).val();
        let api_order = $(`#api_order_${data_index}`).val();
        let api_status = $(`#api_status_${data_index}`).val();
        let api_link = $(`#api_link_${data_index}`).val();
        
        let form_data = {
            api_id: api_id,
            api_title: api_title,
            api_slug: api_slug,
            api_description: api_description,
            meta_version: meta_version,
            api_order: api_order,
            api_status: api_status,
            api_link: api_link
        };
        if(index_action == 'update'){
            let api_meta_id = $(`#api_meta_id_${data_index}`).val();
            form_data.api_meta_id = api_meta_id;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: submit_url,
            data: form_data,
            dataType: "json",
            success: function (response) {
                if(response.success){
                    location.reload();
                }
            }
        });

    });
    $('body').on('keyup','.title-input', function(e) {
        let title = $(this).val();
        let title_id = $(this).data('title-id');
        if(typeof title_id !== 'undefined'){
            $(title_id).text(title);
        }
        
        let slug_id = $(this).data('slug-id');
        if(typeof slug_id !== 'undefined'){
            let slug = title.toLowerCase().replace(/[^a-zA-Z0-9]+/g, '-');
            $(slug_id).val(slug);
        }
    });

    $('.submit-code-details').click(function(e) {
        e.preventDefault();
        let submit_url = $('#code_form_data').attr('action');
        let data_index = $(this).data('index-id');
        let index_action = $(this).data('index-action');

        let api_code_title = $(`#api_code_title_${data_index}`).val();
        let api_code_slug = $(`#api_code_slug_${data_index}`).val();
        let api_code = $(`#api_code_${data_index}`).val();
        let api_meta_id = $(`#api_meta_id_${data_index}`).val();
        let api_technology = $(`#api_technology_${data_index}`).val();
        let api_code_order = $(`#api_code_order_${data_index}`).val();
        let api_code_status = $(`#api_code_status_${data_index}`).val();
        
        let form_data = {
            api_code_title: api_code_title,
            api_code_slug: api_code_slug,
            api_code: api_code,
            api_meta_id: api_meta_id,
            api_technology: api_technology,
            api_code_order: api_code_order,
            api_code_status: api_code_status
        };
        if(index_action == 'update'){
            let api_code_id = $(`#api_code_id_${data_index}`).val();
            form_data.api_code_id = api_code_id;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: submit_url,
            data: form_data,
            dataType: "json",
            success: function (response) {
                if(response.success){
                    location.reload();
                }
            }
        });

    });

    $(".code-block [style]").removeAttr("style");
    $(".code-block pre > pre").unwrap();

</script>
<script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
@include('backend.partials.media-upload.media-js')
@endsection