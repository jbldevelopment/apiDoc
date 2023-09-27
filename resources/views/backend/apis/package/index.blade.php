@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
@endsection
@section('site-title')
    {{__('All Admin Role')}}
@endsection
@section('content')

@php
    $all_benifites = array(
        "Unlimited Pages",
        "All Team Members",
        "Unlimited Leads",
        "Unlimited Page Views",
        "Export in HTML/CSS",
    );
@endphp

    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                @include('backend/partials/message')
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All package')}}</h4>
                        <div class="data-tables datatable-primary">
                            <table id="all_user_table" class="table table-default">
                                <thead class="text-capitalize">
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('title')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Description')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_package as $key => $data)
                                        <tr>
                                            <td>{{$data->api_plan_id}}</td>
                                            <td>
                                                <span class="font-weight-bold">{{$data->api_plan_title}}</span><br>
                                                <span>{{$data->api_discounted_off_text}}</span>
                                            </td>
                                            <td>
                                                @if ($data->api_plan_discounted_price > 0)
                                                    <span class="font-weight-bold">{{number_format($data->api_plan_discounted_price, 2)}}</span><br>
                                                    <span><del>{{number_format($data->api_plan_regular_price, 2)}}</del></span>
                                                @else
                                                    <span class="font-weight-bold">{{number_format($data->api_plan_regular_price, 2)}}</span>    
                                                @endif
                                            </td>
                                            <td>
                                               <div class="permission-show">
                                                   @php $all_per = explode(',', $data->api_plan_descripetion); @endphp
                                                   @foreach($all_per as $benft)
                                                       <span class="text text-success">{{$benft}}</span>
                                                   @endforeach
                                               </div>
                                            </td>
                                            <td>
                                                <x-delete-popover :url="route('api.package.delete',$data->id)"/>
                                                <a href="#" data-id="{{$data->api_plan_id}}" data-title="{{$data->api_plan_title}}" data-duration="{{$data->api_monthly_duration}}" data-text-off="{{$data->api_discounted_off_text}}" data-status="{{$data->api_plane_status}}" data-disc-price="{{$data->api_plan_discounted_price}}" data-regular-price="{{$data->api_plan_regular_price}}" data-description="{{$data->api_plan_descripetion}}" data-toggle="modal" data-target="#api_pakcage_modal" class="btn btn-xs btn-primary btn-sm mb-3 mr-1 user_edit_btn">
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
                        <h4 class="header-title">{{__('Add New Package')}}</h4>
                       <x-error-msg/>
                        <form action="{{route('api.package.add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-lg-1">
                                    <div class="form-group">
                                        <label for="name">{{__('Package Name')}}</label>
                                        <input type="hidden" class="form-control" id="api_id" name="api_id" value="{{$api_details->api_id}}">
                                        <input type="text" class="form-control" id="api_plan_title" name="api_plan_title" placeholder="{{__('Enter Title')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-lg-1">
                                    <div class="form-group">
                                        <label for="name">{{__('Package Regular Price')}}</label>
                                        <input type="text" class="form-control" id="api_plan_regular_price" name="api_plan_regular_price" placeholder="{{__('Ex.: 9999')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-lg-1">
                                    <div class="form-group">
                                        <label for="name">{{__('Package Discounted Price')}}</label>
                                        <input type="text" class="form-control" id="api_plan_discounted_price" name="api_plan_discounted_price" placeholder="{{__('Ex.: 8999')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-lg-1">
                                    <div class="form-group">
                                        <label for="name">{{__('Package Monthly Duaration')}}</label>
                                        <input type="number" class="form-control" id="api_monthly_duration" name="api_monthly_duration" placeholder="{{__('Ex.: 3')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-lg-1">
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select name="api_plane_status" id="api_plane_status" class="form-control">
                                            <option value="0">{{ __('Deactive') }}</option>
                                            <option value="1">{{ __('Active') }}</option>
                                            <option value="2">{{ __('Deleted') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-lg-1">
                                    <div class="form-group">
                                        <label for="name">{{__('text to show on lable')}}</label>
                                        <input type="text" class="form-control" id="api_discounted_off_text" name="api_discounted_off_text" placeholder="{{__('Ex.: SAVE 1000, 1000rs OFF')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-lg-1">
                                    <div class="form-group">
                                        <label for="permission">{{__('Permissions')}}</label>
                                        <select name="api_plan_descripetion[]" multiple id="api_plan_descripetion" class="form-control nice-select wide">
                                            @foreach($all_benifites as $benft)
                                                <option value="{{$benft}}">{{$benft}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <button type="submit" class="btn btn-primary pr-4 pl-4">{{__('Add New Package')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="api_pakcage_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Admin package Edit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('api.package.edit')}}" id="api_package_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="api_plan_id" id="api_plan_id">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-lg-1">
                                <div class="form-group">
                                    <label for="name">{{__('Package Name')}}</label>
                                    <input type="hidden" class="form-control" id="edit_api_id" name="api_id" value="{{$api_details->api_id}}">
                                    <input type="text" class="form-control" id="edit_api_plan_title" name="api_plan_title" placeholder="{{__('Enter Title')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-1">
                                <div class="form-group">
                                    <label for="name">{{__('Package Regular Price')}}</label>
                                    <input type="text" class="form-control" id="edit_api_plan_regular_price" name="api_plan_regular_price" placeholder="{{__('Ex.: 9999')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-1">
                                <div class="form-group">
                                    <label for="name">{{__('Package Discounted Price')}}</label>
                                    <input type="text" class="form-control" id="edit_api_plan_discounted_price" name="api_plan_discounted_price" placeholder="{{__('Ex.: 8999')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-1">
                                <div class="form-group">
                                    <label for="name">{{__('Package Monthly Duaration')}}</label>
                                    <input type="number" class="form-control" id="edit_api_monthly_duration" name="api_monthly_duration" placeholder="{{__('Ex.: 3')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-1">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <select name="api_plane_status" id="edit_api_plane_status" class="form-control">
                                        <option value="0">{{ __('Deactive') }}</option>
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="2">{{ __('Deleted') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-lg-1">
                                <div class="form-group">
                                    <label for="name">{{__('text to show on lable')}}</label>
                                    <input type="text" class="form-control" id="edit_api_discounted_off_text" name="api_discounted_off_text" placeholder="{{__('Ex.: SAVE 1000, 1000rs OFF')}}">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-lg-1">
                                <div class="form-group">
                                    <label for="permission">{{__('Permissions')}}</label>
                                    <select name="api_plan_descripetion[]" multiple id="edit_api_plan_descripetion" class="form-control nice-select wide">
                                        @foreach($all_benifites as $benft)
                                            <option value="{{$benft}}">{{$benft}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('assets/backend/js/jquery.nice-select.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click','.user_edit_btn',function(){
                var el = $(this);
                var form = $('#api_package_modal_form');
                var permission = el.data('description');
                console.log('permission :>> ', permission);

                form.find('#api_plan_id').val(el.data('id'));
                form.find('#edit_api_plan_title').val(el.data('title'));
                form.find('#edit_api_plan_regular_price').val(el.data('regular-price'));
                form.find('#edit_api_plan_discounted_price').val(el.data('disc-price'));
                form.find('#edit_api_monthly_duration').val(el.data('duration'));
                form.find('#edit_api_plane_status').val(el.data('status'));
                form.find('#edit_api_discounted_off_text').val(el.data('text-off'));
                $.each(permission.split(","),function (index,value) {
                    form.find('#edit_api_plan_descripetion option[value="'+value+'"]').attr('selected',true);
                });
                $('#edit_api_plan_descripetion').niceSelect('update');
            });

            if($('.nice-select').length > 0){
                $('.nice-select').niceSelect();
            }
        });
    </script>
@endsection
