@extends('backend.admin-master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
@endsection
@section('site-title')
{{__('All Admin Role')}}
@endsection
@section('content')
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            @include('backend/partials/message')
        </div>
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('All Admin Role')}}</h4>
                    <div class="data-tables datatable-primary">
                        <table id="all_user_table" class="table table-default">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Order')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Created & Updated at')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($technologies as $data)
                                <tr>
                                    <td>{{$data->technolgy_id}}</td>
                                    <td>{{$data->technolgy_name}}</td>
                                    <td>{{$data->technolgy_order}}</td>
                                    <td>@if($data->technolgy_status === 1)
                                        <span class="alert alert-success p-1">{{__('Active')}}</span>
                                        @else
                                        <span class="alert alert-danger p-1">{{__('Deactive')}}</span>
                                        @endif
                                    </td>
                                    <td>{{$data->created_at->format('d M,Y')}} <br> {{$data->updated_at->format('d M,Y')}}</td>
                                    <td>
                                        {{-- <x-delete-popover :url="route('admin.user.role.delete',$data->technolgy_id)" /> --}}
                                        <a href="#" data-id="{{$data->technolgy_id}}" data-name="{{$data->technolgy_name}}" data-order="{{$data->technolgy_order}}" data-status="{{$data->technolgy_status}}" data-slug="{{$data->technolgy_slug}}" data-toggle="modal" data-target="#user_edit_modal" class="btn btn-xs btn-primary btn-sm mb-3 mr-1 user_edit_btn">
                                            <i class="ti-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6  mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{__('Add New Admin Role')}}</h4>
                    <x-error-msg />
                    <form id="techonlogy_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mt-lg-1">
                                <div class="form-group mb-lg-0">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control title-input" data-slug-id="#technolgy_slug" id="technolgy_name" name="technolgy_name" value="" placeholder="{{ __('Title') }}">
                                    <small class="error_technolgy_name text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-lg-1">
                                <div class="form-group mb-lg-0">
                                    <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="technolgy_slug" name="technolgy_slug" value="" placeholder="{{ __('slug') }}">
                                    <small class="error_technolgy_slug text-danger"></small>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-lg-1">
                                <div class="form-group mb-lg-0">
                                    <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="technolgy_order" name="technolgy_order" value="" placeholder="{{ __('Ex: 1,2,3..') }}">
                                    <small class="error_technolgy_order text-danger"></small>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-lg-1">
                                <div class="form-group mb-lg-0">
                                    <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select name="technolgy_status" id="technolgy_status" class="form-control">
                                        <option value="">{{ __('Please Select Status') }}</option>
                                        <option value="0">{{ __('Deactive') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="2">{{ __('Delete') }}</option>
                                    </select>
                                    <small class="error_technolgy_status text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit-technology" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Role')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Admin Role Edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form id="user_edit_modal_form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="technolgy_id" id="technolgy_id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group mb-lg-0">
                                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control title-input" data-slug-id="#edit_technolgy_slug" id="edit_technolgy_name" name="technolgy_name" value="" placeholder="{{ __('Title') }}">
                                <small class="error_edit_technolgy_name text-danger"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group mb-lg-0">
                                <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_technolgy_slug" name="technolgy_slug" value="" placeholder="{{ __('slug') }}">
                                <small class="error_edit_technolgy_slug text-danger"></small>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group mb-lg-0">
                                <label for="title">{{ __('Order') }} <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="edit_technolgy_order" name="technolgy_order" value="" placeholder="{{ __('Ex: 1,2,3..') }}">
                                <small class="error_edit_technolgy_order text-danger"></small>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group mb-lg-0">
                                <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select name="technolgy_status" id="edit_technolgy_status" class="form-control">
                                    <option value="0">{{ __('Deactive') }}</option>
                                    <option value="1">{{ __('Active') }}</option>
                                </select>
                                <small class="error_edit_technolgy_status text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" id="edit-technology" class="btn btn-primary">{{__('Save changes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("form").submit(function(e) {
            e.preventDefault();
        });
        
        $(document).on('click', '.user_edit_btn', function() {
            var el = $(this);
            var form = $('#user_edit_modal_form');
            var permission = el.data('permission');
            form.find('#technolgy_id').val(el.data('id'));
            form.find('#edit_technolgy_name').val(el.data('name'));
            form.find('#edit_technolgy_slug').val(el.data('slug'));
            form.find('#edit_technolgy_order').val(el.data('order'));
            form.find('#edit_technolgy_status').val(el.data('status'));
            $.each(permission, function(index, value) {
                form.find('#edit_permission option[value="' + value + '"]').attr('selected', true);
            });
            $('#edit_permission').niceSelect('update');
        });

        if ($('.nice-select').length > 0) {
            $('.nice-select').niceSelect();
        }

        $('#submit-technology').click(function(e) {
            e.preventDefault();
            let submit_url = "{{ route('techonlogy.add') }}";
            let index_action = $(this).data('index-action');

            let technolgy_name = $(`#technolgy_name`).val();
            let technolgy_slug = $(`#technolgy_slug`).val();
            let technolgy_order = $(`#technolgy_order`).val();
            let technolgy_status = $(`#technolgy_status`).val();

            let form_data = {
                technolgy_name: technolgy_name,
                technolgy_slug: technolgy_slug,
                technolgy_order: technolgy_order,
                technolgy_status: technolgy_status,
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: submit_url,
                data: form_data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            icon: 'success',
                        });
                    } else {
                        if (response.status_code == 400) {
                            $.each(response.message, function(indexInArray, valueOfElement) {
                                $(`.error_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(10000).fadeOut();
                            });
                        }
                    }
                }
            });

        });

        $('#edit-technology').click(function(e) {
            e.preventDefault();
            let submit_url = "{{ route('techonlogy.edit') }}";
            let index_action = $(this).data('index-action');

            let technolgy_id = $(`#technolgy_id`).val();
            let technolgy_name = $(`#edit_technolgy_name`).val();
            let technolgy_slug = $(`#edit_technolgy_slug`).val();
            let technolgy_order = $(`#edit_technolgy_order`).val();
            let technolgy_status = $(`#edit_technolgy_status`).val();

            let form_data = {
                technolgy_id: technolgy_id,
                technolgy_name: technolgy_name,
                technolgy_slug: technolgy_slug,
                technolgy_order: technolgy_order,
                technolgy_status: technolgy_status,
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: submit_url,
                data: form_data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            icon: 'success',
                        });
                    } else {
                        if (response.status_code == 400) {
                            $.each(response.message, function(indexInArray, valueOfElement) {
                                $(`.error_edit_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(10000).fadeOut();
                            });
                        }
                    }
                }
            });

        });
    });
</script>
@endsection