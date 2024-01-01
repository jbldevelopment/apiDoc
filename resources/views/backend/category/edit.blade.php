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
                        <h4 class="header-title">{{ __('Edit Api : ') . $api_details->api_category_title }}</h4>
                    </div>
                    <form id="category_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="hidden" name="api_category_id" value="{{$api_details->api_category_id}}">
                                    <input type="hidden" name="old_api_category_icon" value="{{$api_details->api_category_icon}}">
                                    <input type="hidden" name="old_api_bg_img_url" value="{{$api_details->api_bg_img_url}}">
                                    <input type="text" class="form-control title-input" data-slug-id="#api_category_slug" id="api_category_title" value="{{$api_details->api_category_title}}" name="api_category_title" placeholder="{{ __('Title') }}">
                                    <small class="error_api_category_title text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Short Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="api_category_short_desc" name="api_category_short_desc" placeholder="{{ __('Short Description') }}" rows="4">{{$api_details->api_category_short_desc}}</textarea>
                                    <small class="error_api_category_short_desc text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}} <span class="text-danger">*</span></label>
                                    <input type="hidden" name="api_category_descripetion" value="{{$api_details->api_category_descripetion}}">
                                    <div class="summernote" data-content='{{$api_details->api_category_descripetion}}'></div>
                                    <small class="error_api_category_descripetion text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="api_category_slug" value="{{$api_details->api_category_slug}}" name="api_category_slug" placeholder="{{ __('slug') }}">
                                    <small class="error_api_category_slug text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select name="api_category_status" id="api_category_status" class="form-control">
                                        <option {{ ($api_details->api_category_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                        <option {{ ($api_details->api_category_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                    </select>
                                    <small class="error_api_category_status text-danger"></small>
                                </div>
                                
                                <div class="d-flex">
                                    <div class="form-group w-50 mr-lg-2">
                                        <label>{{ __('icon') }} <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="api_category_icon" name="api_category_icon">
                                        <small class="error_api_category_icon text-danger"></small>
                                    </div>
                                    <div class="form-group w-50">
                                        <label>{{ __('Bg Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="api_category_bg_img_url" name="api_category_bg_img_url">
                                        <small class="error_api_category_bg_img_url text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="api_category_order" value="{{$api_details->api_category_order}}" name="api_category_order" placeholder="{{ __('Ex: 1,2,3..') }}">
                                    <small class="error_api_category_order text-danger"></small>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="reset" class="btn btn-danger mt-4 pr-4 pl-4">Reset</button>
                                    <button type="submit" id="submit-category-details" class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Changes') }}</button>
                                </div>
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
            $('#submit-category-details').click(function(e) {
                e.preventDefault();
                let submit_url = "{{ route('category.update') }}";

                var formData = new FormData($('#category_form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    type: "post",
                    url: submit_url,
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.success){
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.replace("{{route('category.list')}}");
                                }
                            });
                        } else {
                            if(response.status_code == 400){
                                $.each(response.message, function (indexInArray, valueOfElement) { 
                                    console.log(indexInArray, valueOfElement);
                                    $(`.error_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(2000).fadeOut();
                                });
                            } else {
                                Swal.fire({
                                    title: response.message,
                                    icon: 'error',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                        location.replace("{{route('category.list')}}");
                                    }
                                });
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
