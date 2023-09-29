@extends('backend.admin-master')
@section('style')
    @include('backend.partials.media-upload.style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}">
@endsection
@section('site-title')
    {{ __('New category') }}
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
                        <h4 class="header-title">{{ __('Add New category') }}</h4>
                    </div>
                    <form action="{{ route('category.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control title-input" data-slug-id="#api_category_slug" id="api_category_title" name="api_category_title" placeholder="{{ __('Title') }}">
                                </div>
                                <div class="form-group classic-editor-wrapper">
                                    <label>{{ __('Decription') }}</label>
                                    <input type="hidden" name="api_category_descripetion">
                                    <div class="summernote"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="slug">{{ __('Slug') }}</label>
                                    <input type="text" class="form-control" id="api_category_slug" name="api_category_slug"
                                        placeholder="{{ __('slug') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select name="api_category_status" id="api_category_status" class="form-control">
                                        <option value="0">{{ __('Deactive') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">{{ __('Order') }}</label>
                                    <input type="number" class="form-control" id="api_category_order" name="api_category_order"
                                        placeholder="{{ __('Ex: 1,2,3..') }}">
                                </div>
                                <button type="submit"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Save category') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
    {{-- @include('backend.partials.media-upload.media-upload-markup') --}}
@endsection
@section('script')
    <script src="{{ asset('assets/backend/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/backend/js/summernote-bs4.js') }}"></script>
    <x-backend.auto-slug-js :url="route('admin.page.slug.check')" :type="'new'" />
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200, //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if ($('.summernote').length > 1) {
                $('.summernote').each(function(index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
    <script src="{{ asset('assets/backend/js/dropzone.js') }}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
