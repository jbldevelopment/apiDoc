@extends('backend.admin-master')
@section('style')
@include('backend.partials.media-upload.style')
<link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-min/ace.js" type="text/javascript" charset="utf-8"></script>

@endsection
@section('site-title')
{{ __('Edit API') }}
@endsection
@section('content')
<style>
    .numbers{
        display: none;
    }
    table tr th,
    table tr td {
        border-top: 1px solid rgba(0, 0, 0, 1) !important;
    }
</style>
<section class="bg-dark h-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 pl-lg-0 border-bottom border-top">
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
            <div class="col-lg-10 px-lg-0 border-bottom border-top">
                <div class="row h-100 w-100">
                    <div class="col-lg-7 py-lg-2 doc-meta-details border-right">
                        <form action="{{ route('api.meta.add') }}" method="post" enctype="multipart/form-data" id="meta_form_data">
                            @csrf
                            <div class="btn btn-outline-warning w-100" id="new_section">Add New Section</div>
                            <div id="accordion">
                                {{-- meta --}}
                                @foreach ($api_meta_list as $item)                           
                                <div class="card my-lg-2 border-dark section_index card_index" id="{{$item->api_meta_slug}}">
                                    <div class="card-header card_header_{{$item->api_meta_id}}" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white " id="title_{{$item->api_meta_id}}">
                                                {{$item->api_meta_title}}
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <div class="btn btn-outline-info mr-1" data-toggle="collapse" data-target="#api_meta_details_{{$item->api_meta_id}}" aria-expanded="true" aria-controls="api_meta_details_{{$item->api_meta_id}}">
                                                    <i class="ti-pencil"></i>
                                                </div>
                                                <div class="btn btn-outline-info mr-1">
                                                    <i class="ti-shortcode"></i>
                                                </div>
                                                <div class="btn btn-outline-danger remove_meta_details" data-meta-id="{{$item->api_meta_id}}" data-card-id="{{$item->api_meta_slug}}">
                                                    <i class="ti-trash"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="api_meta_details_{{$item->api_meta_id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" class="form-control" id="api_id_{{$item->api_meta_id}}" name="api_id[]" value="{{$api_details->api_id}}">
                                                        <input type="hidden" class="form-control" id="api_meta_id_{{$item->api_meta_id}}" name="api_meta_id[]" value="{{$item->api_meta_id}}">
                                                        <input type="text" class="form-control title-input" data-title-id="#title_{{$item->api_meta_id}}" data-slug-id="#api_slug_{{$item->api_meta_id}}" id="api_title_{{$item->api_meta_id}}" value="{{$item->api_meta_title}}" name="api_title[]" placeholder="{{ __('Title') }}">
                                                        <small class="error_api_title_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_slug_{{$item->api_meta_id}}" value="{{$item->api_meta_slug}}" name="api_slug[]" placeholder="{{ __('slug') }}">
                                                        <small class="error_api_slug_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-2">
                                                    <div class="form-group mb-lg-2 classic-editor-wrapper">
                                                        <label>{{ __('Decription') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" id="api_description_{{$item->api_meta_id}}" name="api_description[]">
                                                        <div class="summernote" data-content='{{$item->api_meta_descripetion}}'></div>
                                                        <small class="error_api_description_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Meta version') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="meta_version_{{$item->api_meta_id}}" value="{{$item->api_meta_version}}" name="meta_version[]" placeholder="{{ __('https://github.com/') }}">
                                                        <small class="error_meta_version_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="api_order_{{$item->api_meta_id}}" value="{{$item->api_meta_order}}" name="api_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                        <small class="error_api_order_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                                        <select name="api_status[]" id="api_status_{{$item->api_meta_id}}" class="form-control">
                                                            <option value="">{{ __('Please Select Status') }}</option>
                                                            <option {{ ($item->api_meta_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                                            <option {{ ($item->api_meta_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                                        </select>
                                                        <small class="error_api_status_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Source Code Link') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_link_{{$item->api_meta_id}}" value="{{$item->api_meta_link}}" name="api_link[]" placeholder="{{ __('https://github.com/') }}">
                                                        <small class="error_api_link_{{$item->api_meta_id}} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title" style="opacity: 0;">{{ __('ssss ') }} <span class="text-danger"></span></label>
                                                        <div class="btn btn-primary mr-lg-2 btn-sm submit-meta-details w-100" data-index-id="{{$item->api_meta_id}}" data-index-action="update">{{ __('Change') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- end meta --}}
                            </div>
                        </form>
                    </div>  
                    <div class="col-lg-5 pt-lg-2 bg-dark text-white">
                        <form action="{{ route('api.code.add') }}" method="post" enctype="multipart/form-data" id="code_form_data">
                            @csrf
                            <div class="btn btn-outline-warning w-100" id="new_code_meta">Add New Code</div>
                            <div id="accordion-2">
                                {{-- code meta --}}
                                @foreach ($api_code_meta_list as $code)
                                <div class="card my-lg-2 border-dark meta_code_index card_index" id="{{$code->api_code_slug}}">
                                    <div class="card-header header_codemeta_{{$code->api_code_id}}" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white" id="code_title_{{$code->api_code_id}}">
                                                {{$code->api_code_title}}
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <div class="btn btn-outline-info mr-1" data-toggle="collapse" data-target="#code_meta_{{$code->api_code_id}}" aria-expanded="true" aria-controls="code_meta_{{$code->api_code_id}}">
                                                    <i class="ti-pencil"></i>
                                                </div>
                                                <div class="btn btn-outline-danger remove_code_meta_details" data-code-meta-id="{{$code->api_code_id}}" data-card-code-id="{{$code->api_code_slug}}">
                                                    <i class="ti-trash"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="code_meta_{{$code->api_code_id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-2">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" class="form-control" id="api_code_id_{{$code->api_code_id}}" name="api_code_id[]" value="{{$code->api_code_id}}">
                                                        <input type="text" class="form-control title-input" data-title-id="#code_title_{{$code->api_code_id}}" data-slug-id="#api_code_slug_{{$code->api_code_id}}" id="api_code_title_{{$code->api_code_id}}" name="api_code_title[]" value="{{$code->api_code_title}}" placeholder="{{ __('Title') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_code_slug_{{$code->api_code_id}}" name="api_code_slug[]" value="{{$code->api_code_slug}}" placeholder="{{ __('slug') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-1">
                                                    <div class="form-group my-lg-2 classic-editor-wrapper">
                                                        <label class="mb-1">{{ __('Code') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" id="api_code_{{$code->api_code_id}}" name="api_code[]">
                                                        <div id="api_code_details_{{$code->api_code_id}}" name="api_code_details[]" class="w-100 editors" style="height: 200px;"><pre>{!!$code->api_code!!}</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('API Meta') }} <span class="text-danger">*</span></label>
                                                        <select id="api_code_meta_id_{{$code->api_code_id}}" name="api_code_meta_id_[]" class="form-control section_options">
                                                            @foreach ($api_meta_list as $items)
                                                                <option def="{{$code->api_meta_id}}" abc="{{$items->api_meta_id}}" {{ ($code->api_meta_id == $items->api_meta_id) ? "selected" : "" }} value="{{$items->api_meta_id}}">{{$items->api_meta_title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Technology') }} <span class="text-danger">*</span></label>
                                                        <select name="api_technology[]" id="api_technology_{{$code->api_code_id}}" class="form-control">
                                                            @foreach ($technlogies as $item)
                                                                <option {{ ($item->technology_id == $code->api_technology) ? "selected" : "" }} value="{{$item->technology_id}}">{{ __($item->technology_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="api_code_order_{{$code->api_code_id}}" name="api_code_order[]" value="{{$code->api_code_order}}" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                                        <select name="api_code_status[]" id="api_code_status_{{$code->api_code_id}}" class="form-control">
                                                            <option {{ ($code->api_code_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                                            <option {{ ($code->api_code_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title" style="opacity: 0;">{{ __('ssss ') }} <span class="text-danger"></span></label>
                                                        <div class="btn btn-primary mr-lg-2 btn-sm submit-code-details w-100"  data-index-id="{{$code->api_code_id}}" data-index-action="update">{{ __('Change') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- end code meta --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

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

    $('#new_section').click(function (e) { 
        e.preventDefault();
        if(get_section_data()){
            let count = $('.section_index').length + 1;
            let section_html = `<div class="card my-lg-2 border-dark section_index card_index" id='dynamic_${count}'>
                                    <div class="card-header card_header_0_${count}" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white" id="title_0_${count}">
                                                Section Title
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <div class="btn btn-outline-info mr-1" data-toggle="collapse" data-target="#api_meta_details_0_${count}" aria-expanded="true" aria-controls="api_meta_details_0_${count}">
                                                    <i class="ti-pencil"></i>
                                                </div>
                                                <div class="btn btn-outline-info mr-1">
                                                    <i class="ti-shortcode"></i>
                                                </div>
                                                <div class="btn btn-outline-danger remove_meta_details dynamic" data-card-id='dynamic_${count}'>
                                                    <i class="ti-trash"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="api_meta_details_0_${count}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" class="form-control" id="api_id_0_${count}" name="api_id[]" value="{{$api_details->api_id}}">
                                                        <input type="hidden" class="form-control" id="api_meta_id_0_${count}" name="api_meta_id[]" value="{{$api_details->api_id}}">
                                                        <input type="text" class="form-control title-input" data-title-id="#title_0_${count}" data-slug-id="#api_slug_0_${count}" id="api_title_0_${count}" name="api_title[]" placeholder="{{ __('Title') }}">
                                                        <small class="error_api_title_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_slug_0_${count}" name="api_slug[]" placeholder="{{ __('slug') }}">
                                                        <small class="error_api_slug_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-2">
                                                    <div class="form-group mb-lg-2 classic-editor-wrapper">
                                                        <label>{{ __('Decription') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" id="api_description_0_${count}" name="api_description[]">
                                                        <div class="summernote" ></div>
                                                        <small class="error_api_description_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Meta version') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="meta_version_0_${count}" name="meta_version[]" placeholder="{{ __('https://github.com/') }}">
                                                        <small class="error_meta_version_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="api_order_0_${count}" name="api_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                        <small class="error_api_order_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                                        <select name="api_status[]" id="api_status_0_${count}" class="form-control">
                                                            <option value="">{{ __('Please Select Status') }}</option>
                                                            <option value="0">{{ __('Deactive') }}</option>
                                                            <option value="1">{{ __('Active') }}</option>
                                                        </select>
                                                        <small class="error_api_status_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Source Code Link') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_link_0_${count}" name="api_link[]" placeholder="{{ __('https://github.com/') }}">
                                                        <small class="error_api_link_0_${count} text-danger"></small>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-2 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title" style="opacity: 0;">{{ __('ssss ') }} <span class="text-danger"></span></label>
                                                        <div class="btn btn-primary mr-lg-2 btn-sm submit-meta-details w-100" data-index-id="0_${count}" data-index-action="add" id="dynamic_save_0_${count}">{{ __('Save') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
    
            $('#accordion').prepend(section_html);     
            
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
        }
    });

    $('#new_code_meta').click(function (e) { 
        e.preventDefault();
        if(get_meta_section_data()){
            let meta_count = $('.meta_code_index').length + 1;
            let meta_code_html = `<div class="card my-lg-2 border-dark meta_code_index card_index" id="dynamic_meta_${meta_count}">
                                    <div class="card-header header_codemeta_0_${meta_count}" id="headingOne">
                                        <h5 class="mb-0 d-lg-flex justify-content-lg-between">
                                            <div class="btn text-white" id="code_title_0_${meta_count}">
                                                Page / Code Title
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <div class="btn btn-outline-info mr-1" data-toggle="collapse" data-target="#api_meta_details_0_${meta_count}" aria-expanded="true" aria-controls="api_meta_details_0_${meta_count}">
                                                    <i class="ti-pencil"></i>
                                                </div>
                                                <div class="btn btn-outline-info" data-toggle="collapse" data-target="#code_meta_0_${meta_count}" aria-expanded="true" aria-controls="code_meta_0_${meta_count}">
                                                    <i class="ti-angle-down"></i>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="code_meta_0_${meta_count}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-2">
                                        <div class="card-body">
                                            <div class="row py-lg-3">
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                                        <input type="hidden" class="form-control" id="api_code_id_0_${meta_count}" name="api_code_id[]" value="0_${meta_count}">
                                                        <input type="text" class="form-control title-input" data-title-id="#code_title_0_${meta_count}" data-slug-id="#api_code_slug_0_${meta_count}" id="api_code_title_0_${meta_count}" name="api_code_title[]" placeholder="{{ __('Title') }}">
                                                        <small class="error_api_code_title_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="api_code_slug_0_${meta_count}" name="api_code_slug[]" placeholder="{{ __('slug') }}">
                                                        <small class="error_api_code_slug_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-lg-1">
                                                    <div class="form-group mb-lg-2">
                                                        <label>{{ __('Code') }} <span class="text-danger">*</span></label>
                                                        <div id="api_code_details_0_${meta_count}" name="api_code_details[]" class="w-100 editors" style="height: 200px;">// Write code here</div>
                                                        <small class="error_api_code_details_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('API Meta') }} <span class="text-danger">*</span></label>
                                                        <select id="api_code_meta_id_0_${meta_count}" name="api_code_meta_id_[]" class="form-control section_options">
                                                            <option value="">{{ __('Please Select Api') }}</option>
                                                            @foreach ($api_meta_list as $item)
                                                                <option value="{{$item->api_meta_id}}">{{$item->api_meta_title}}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="error_api_code_meta_id_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Technology') }} <span class="text-danger">*</span></label>
                                                        <select name="api_technology[]" id="api_technology_0_${meta_count}" class="form-control">
                                                            <option value="">{{ __('Please Select Technlogy') }}</option>
                                                            @foreach ($technlogies as $item)
                                                            <option value="{{$item->technology_id}}">{{ __($item->technology_name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="error_api_technology_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="api_code_order_0_${meta_count}" name="api_code_order[]" placeholder="{{ __('Ex: 1,2,3..') }}">
                                                        <small class="error_api_code_order_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 mt-lg-1">
                                                    <div class="form-group mb-lg-0">
                                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                                        <select name="api_code_status[]" id="api_code_status_0_${meta_count}" class="form-control">
                                                            <option value="">{{ __('Please Select Status') }}</option>
                                                            <option value="0">{{ __('Deactive') }}</option>
                                                            <option value="1">{{ __('Active') }}</option>
                                                        </select>
                                                        <small class="error_api_code_status_0_${meta_count} text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-lg-2">
                                                    <div class="form-group mb-lg-0">
                                                        <label for="title" style="opacity: 0;">{{ __('ssss ') }} <span class="text-danger"></span></label>
                                                        <div class="btn btn-primary mr-lg-2 btn-sm submit-code-details w-100" data-index-id="0_${meta_count}" data-index-action="save" id="dynamic_code_save_0_${meta_count}">{{ __('Save') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

            $('#accordion-2').prepend(meta_code_html);

            var editor = ace.edit(`api_code_details_0_${meta_count}`);
            editor.setTheme("ace/theme/tomorrow_night_bright");
            editor.getSession().setMode("ace/mode/javascript");   
        }       
    });

    $('body').on('click','.remove_meta_details', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '{{__("Are you sure?")}}',
            text: '{{__("You would not be able to revert this item!")}}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{__('Yes, delete it!')}}",
            cancelButtonText: "{{__('cancel')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                let data_card_id = $(this).data('card-id');
                if(!$(this).hasClass('dynamic')){
                    let data_meta_id = $(this).data('meta-id');
                    $.ajax({
                        type: "GET",
                        url: '/admin-home/apimeta/delete/' + data_meta_id,
                        data: {},
                        dataType: "json",
                        success: function (response) {
                            console.log('response :>> ', response);
                        }
                    });
                }
                $(`#${data_card_id}`).remove();
            }
        });

    });

    $('body').on('click','.remove_code_meta_details', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '{{__("Are you sure?")}}',
            text: '{{__("You would not be able to revert this item!")}}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{__('Yes, delete it!')}}",
            cancelButtonText: "{{__('cancel')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                let data_card_id = $(this).data('card-code-id');
                if(!$(this).hasClass('dynamic')){
                    let data_meta_id = $(this).data('code-meta-id');
                    $.ajax({
                        type: "GET",
                        url: '/admin-home/apicode/delete/' + data_meta_id,
                        data: {},
                        dataType: "json",
                        success: function (response) {
                            console.log('response :>> ', response);
                        }
                    });
                }
                $(`#${data_card_id}`).remove();
            }
        });

    });

    $('body').on('click','.submit-meta-details', function(e) {
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
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (typeof response.data.inserted_id !== 'undefined'){
                                $('.section_options').append(`<option value="${response.data.inserted_id}">${api_title}</option>`);
                                $(`#api_meta_id_${data_index}`).val(response.data.inserted_id);
                                $(`#dynamic_save_${data_index}`).data('index-action', 'update').html('Change');
                                $(`.navigation-slug-tag-html`).append(`<li class="nav-item"> <a class="nav-link text-white" href="#${api_slug}">${api_title}</a> </li>`);
                            }
                        }
                    });
                } else {
                    if(response.status_code == 400){
                        $.each(response.message, function (indexInArray, valueOfElement) { 
                            $(`.error_${indexInArray}_${data_index}`).html(valueOfElement[0]).fadeIn().delay(5000).fadeOut();
                        });
                    }
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

    $('body').on('click','.submit-code-details', function(e) {
        e.preventDefault();
        let submit_url = $('#code_form_data').attr('action');
        let data_index = $(this).data('index-id');
        let index_action = $(this).data('index-action');

        let api_code_title = $(`#api_code_title_${data_index}`).val();
        let api_code_slug = $(`#api_code_slug_${data_index}`).val();

        var editor = ace.edit(`api_code_details_${data_index}`);
        var api_code = editor.getValue();
        
        let api_code_meta_id = $(`#api_code_meta_id_${data_index}`).val();
        let api_technology = $(`#api_technology_${data_index}`).val();
        let api_code_order = $(`#api_code_order_${data_index}`).val();
        let api_code_status = $(`#api_code_status_${data_index}`).val();
        
        let form_data = {
            api_code_title: api_code_title,
            api_code_slug: api_code_slug,
            api_code: api_code,
            api_code_meta_id: api_code_meta_id,
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
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (typeof response.data.inserted_id !== 'undefined'){
                                $(`#dynamic_code_save_${data_index}`).data('index-action', 'update').html('Change');
                                $(`#api_code_id_${data_index}`).val(response.data.inserted_id);
                            }
                        }
                    });
                } else {
                    if(response.status_code == 400){
                        $.each(response.message, function (indexInArray, valueOfElement) { 
                            $(`.error_${indexInArray}_${data_index}`).html(valueOfElement[0]).fadeIn().delay(5000).fadeOut();
                        });
                    }
                }
            }
        });

    });

    $(".code-block [style]").removeAttr("style");
    $(".code-block pre > pre").unwrap();

    $('.editors').each(function (index, element) {
        var editor = ace.edit(element.id);
        editor.setTheme("ace/theme/tomorrow_night_bright");
        editor.getSession().setMode("ace/mode/javascript");
        if(element.id != 'api_code_details_0'){
            editor.setOptions({
                maxLines: Infinity
            });
        }
        
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
    function get_section_data(){
        let final_response = true;
        $('.submit-meta-details').each(function (index, element) {
            let dataValue = $(element).data('index-id');
            let title = $(`#api_title_${dataValue}`).val();
            let slug = $(`#api_slug_${dataValue}`).val();
            let add_class = '';
            let remove_class = '';
            if(title != '' && slug != ''){
                final_response = (final_response != false) ? true : false;
            } else {
                final_response = false;
                add_class = 'border border-danger';
                remove_class = 'border-success';
                Swal.fire({
                    title: 'Please Fill Highlighted Secations.',
                    icon: 'warning',
                });
            }
            $(`.card_header_${dataValue}`).addClass(add_class).removeClass(remove_class);
        });
        return final_response;
    }
    function get_meta_section_data(){
        let final_response = true;
        $('.submit-code-details').each(function (index, element) {
            let dataValue = $(element).data('index-id');
            let title = $(`#api_code_title_${dataValue}`).val();
            let slug = $(`#api_code_slug_${dataValue}`).val();
            let add_class = '';
            let remove_class = '';
            if(title != '' && slug != ''){
                final_response = (final_response != false) ? true : false;
            } else {
                final_response = false;
                add_class = 'border border-danger';
                remove_class = 'border-success';
                Swal.fire({
                    title: 'Please Fill Highlighted Secations.',
                    icon: 'warning',
                });
            }
            console.log('header_codemeta_ :>> ', `.header_codemeta_${dataValue}`);
            $(`.header_codemeta_${dataValue}`).addClass(add_class).removeClass(remove_class);
        });
        return final_response;
    }

</script>

<script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
@include('backend.partials.media-upload.media-js')
@endsection