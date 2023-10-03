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
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
            <x-error-msg />
            <x-flash-msg />
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title">{{ __('Edit Api : ') }}<span id="code_title">{{ $api_details->api_title }}</span></h4>
                    </div>
                    <form id="api_details" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="hidden" name="api_id" id="api_id" value="{{$api_details->api_id}}" class="input-fields">
                                    <input type="text" class="form-control input-fields title-input" data-title-id="#code_title" data-slug-id="#api_slug" id="api_title" value="{{$api_details->api_title}}" name="api_title" placeholder="{{ __('Title') }}">
                                    <small class="error_api_title text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}} <span class="text-danger">*</span></label>
                                    <input type="hidden" name="api_description" value="{{$api_details->api_description}}" class="input-fields">
                                    <div class="summernote" data-content='{{$api_details->api_description}}'></div>
                                    <small class="error_api_description text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-fields" id="api_slug" value="{{$api_details->api_slug}}" name="api_slug" placeholder="{{ __('slug') }}">
                                    <small class="error_api_slug text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select name="api_status" id="api_status" class="form-control input-fields">
                                        <option value="">{{ __('Please Select Status') }}</option>
                                        <option {{ ($api_details->api_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                        <option {{ ($api_details->api_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                    </select>
                                    <small class="error_api_status text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <select id="api_type" name="api_type" class="form-control input-fields">
                                        <option value="">{{ __('Please Select Type') }}</option>
                                        <option {{ ($api_details->api_type == 1) ? "selected" : "" }} value="1">{{ __('Paid') }}</option>
                                        <option {{ ($api_details->api_type == 0) ? "selected" : "" }} value="0">{{ __('Free') }}</option>
                                    </select>
                                    <small class="error_api_type text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Category') }} <span class="text-danger">*</span></label>
                                    <select id="api_category" name="api_category" class="form-control input-fields">
                                        <option>{{ __('Please Select Category') }}</option>
                                        @foreach ($active_category as $item)
                                            <option {{ ($api_details->api_category == $item->api_category_id) ? "selected" : "" }} value="{{$item->api_category_id}}">{{$item->api_category_title}}</option>
                                        @endforeach
                                    </select>
                                    <small class="error_api_category text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control input-fields" id="api_order" value="{{$api_details->api_order}}" name="api_order" placeholder="{{ __('Ex: 1,2,3..') }}">
                                    <small class="error_api_order text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Source Code Link') }}</label>
                                    <input type="text" class="form-control input-fields" id="api_link" value="{{$api_details->api_link}}" name="api_link" placeholder="{{ __('https://github.com/') }}">
                                    <small class="error_api_link text-danger"></small>
                                </div>
                                <button type="submit" id="submit-api-details" class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Changes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
    <x-backend.auto-slug-js :url="route('admin.page.slug.check')" :type="'update'"/>
    <script>
        $(document).ready(function () {
            $("form").submit(function(e){
                e.preventDefault();
            });
            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
            $('#submit-api-details').click(function(e) {
                e.preventDefault();
                let submit_url = "{{ route('api.update') }}";

                var formData = {};
                $('.input-fields').each(function (index, element) {
                    formData[element.name] = element.value;
                });
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "post",
                    url: submit_url,
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if(response.success){
                            location.replace("{{route('api.list')}}");
                        } else {
                            co
                            if(response.status_code == 400){
                                $.each(response.message, function (indexInArray, valueOfElement) { 
                                    console.log(indexInArray, valueOfElement);
                                    $(`.error_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(2000).fadeOut();
                                });
                            } else {
                                location.replace("{{route('api.list')}}");
                            }
                        }
                    }
                });

            });
        });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
