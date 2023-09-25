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
                    <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="hidden" name="api_category_id" value="{{$api_details->api_category_id}}">
                                    <input type="text" class="form-control" id="api_category_title" value="{{$api_details->api_category_title}}" name="api_category_title" placeholder="{{ __('Title') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Content')}}</label>
                                    <input type="hidden" name="api_category_descripetion" value="{{$api_details->api_category_descripetion}}">
                                    <div class="summernote" data-content='{{$api_details->api_category_descripetion}}'></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" id="api_category_slug" value="{{$api_details->api_category_slug}}" name="api_category_slug" placeholder="{{ __('slug') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select name="api_category_status" id="api_category_status" class="form-control">
                                        <option {{ ($api_details->api_category_status == 0) ? "selected" : "" }} value="0">{{ __('Deactive') }}</option>
                                        <option {{ ($api_details->api_category_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Order') }}</label>
                                    <input type="number" class="form-control" id="api_category_order" value="{{$api_details->api_category_order}}" name="api_category_order" placeholder="{{ __('Ex: 1,2,3..') }}">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Update Changes') }}</button>
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
        });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
