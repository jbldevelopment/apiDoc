@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Leads')}}
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
@endsection
@section('content')
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
            <x-error-msg />
            <x-flash-msg />
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="lead_details" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lead_name">{{ __('Lead Name') }} <span class="text-danger">*</span></label>
                                    <input type="hidden" name="lead_id" id="lead_id" value="{{$lead_details->lead_id}}" class="input-fields">
                                    <input type="text" class="form-control input-fields" id="lead_name" value="{{$lead_details->lead_name}}" name="lead_name">
                                    <small class="error_lead_name text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="lead_name">{{ __('Lead Verified') }} <span class="text-danger">*</span></label>
                                    <select id="lead_verified" name="lead_verified" class="form-control input-fields">
                                        <option value="">{{ __('Please Select Option') }}</option>
                                        <option {{ ($lead_details->lead_verified == 1) ? "selected" : "" }} value="1">{{ __('Verified') }}</option>
                                        <option {{ ($lead_details->lead_verified == 0) ? "selected" : "" }} value="0">{{ __('Not Verified') }}</option>
                                    </select>
                                    <small class="error_lead_verified text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="lead_name">{{ __('Lead Name') }} <span class="text-danger">*</span></label>
                                    <select id="lead_status" name="lead_status" class="form-control input-fields">
                                        <option value="">{{ __('Please Select Status') }}</option>
                                        <option {{ ($lead_details->lead_status == 0) ? "selected" : "" }} value="0">{{ __('Pending') }}</option>
                                        <option {{ ($lead_details->lead_status == 1) ? "selected" : "" }} value="1">{{ __('Active') }}</option>
                                        <option {{ ($lead_details->lead_status == 2) ? "selected" : "" }} value="2">{{ __('Completed') }}</option>
                                        <option {{ ($lead_details->lead_status == 3) ? "selected" : "" }} value="3">{{ __('Canceled') }}</option>
                                        <option {{ ($lead_details->lead_status == 4) ? "selected" : "" }} value="4">{{ __('Deleted') }}</option>
                                    </select>
                                    <small class="error_lead_status text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lead_email">{{ __('Lead email') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-fields" id="lead_email" value="{{$lead_details->lead_email}}" name="lead_email">
                                    <small class="error_lead_email text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lead_mobile">{{ __('Lead mobile') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-fields" id="lead_mobile" value="{{$lead_details->lead_mobile}}" name="lead_mobile">
                                    <small class="error_lead_mobile text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="lead_occupation">{{ __('Lead occupation') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-fields" id="lead_occupation" value="{{$lead_details->lead_occupation}}" name="lead_occupation">
                                    <small class="error_lead_occupation text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" id="submit-api-details">{{ __('Update Lead') }}</button>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3 border-top">
                                <div class="table-wrap table-responsive mt-3">
                                    <table class="table table-default">
                                        <thead>
                                            <th class="no-sort">
                                                <div class="mark-all-checkbox">
                                                    <input type="checkbox" class="all-checkbox">
                                                </div>
                                            </th>
                                            <th>{{__('Meta ID')}}</th>
                                            <th>{{__('inquiry For')}} </th>
                                            <th>{{__('FolllowUp Status')}}</th>
                                            <th>{{__('Created At')}} </th>
                                            <th>{{__('Last Status Updated At')}}</th>
                                            <th>{{__('View')}}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($lead_meta as $key => $meta)
                                            <tr>
                                                <th class="no-sort">
                                                    <div class="mark-all-checkbox">
                                                        <input type="checkbox" class="all-checkbox">
                                                    </div>
                                                </th>
                                                <th>{{ $meta->lead_meta_id }}</th>
                                                <th>
                                                    @php
                                                        $status = 'Pending';
                                                        $status_color = 'secondary';
                                                        if (str_contains($meta->lead_intrest, 'CAT-')) {
                                                            $new_intrest = str_replace('CAT-', '', $meta->lead_intrest);
                                                            $lead_meta_intrest = App\ApiCategory::select('api_category_title')->where('api_category_id', $new_intrest)->first()->api_category_title;
                                                        } else if(str_contains($meta->lead_intrest, 'API-')){
                                                            $new_intrest = str_replace('API-', '', $meta->lead_intrest);
                                                            $lead_meta_intrest = App\ApiCategory::select('api_category_title')->where('api_category_id', $new_intrest)->first()->api_category_title;
                                                        }
                                                        @endphp
                                                        {{$lead_meta_intrest }}
                                                </th>
                                                <th>
                                                    @php
                                                        $status = 'Pending';
                                                        $status_color = 'secondary';
                                                        if($meta->lead_status == 1){
                                                            $status_color = 'info';
                                                            $status = 'Active';
                                                        } else if($meta->lead_status == 2){
                                                            $status_color = 'success';
                                                            $status = 'Completed';
                                                        } else if($meta->lead_status == 3){
                                                            $status_color = 'warnign';
                                                            $status = 'Canceled';
                                                        } else if($meta->lead_status == 4){
                                                            $status_color = 'danger';
                                                            $status = 'Deleted';
                                                        }
                                                        
                                                    @endphp
                                                    <div class="w-75 text-center border border-{{$status_color}} p-1 text-{{$status_color}}" target="_blank">
                                                        <span>{{$status}}</span>
                                                    </div>    
                                                </th>
                                                <th>
                                                    {{$meta->created_at->format('d M,Y H:i A')}}
                                                </th>
                                                <th>
                                                    {{$meta->updated_at->format('d M,Y H:i A')}}
                                                </th>
                                                <th>
                                                    <a href="#" data-lead_meta_id="{{$meta->lead_meta_id}}" data-lead_intrest="{{$meta->lead_intrest}}" data-status="{{$meta->lead_status}}" data-toggle="modal" data-target="#lead_meta_edit_modal" class="btn btn-xs btn-primary btn-sm mb-3 mr-1 lead_meta_edit_btn">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </th>
                                            </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lead_meta_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Lead Meta Edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form id="lead_meta_edit_modal_form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="edit_lead_meta_id" id="edit_lead_meta_id">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group">
                                <label for="edit_lead_meta_intrest">{{ __('Lead Intrest') }} <span class="text-danger">*</span></label>
                                <select id="edit_lead_meta_intrest" name="edit_lead_meta_intrest" class="form-control input-fields">
                                    <option value="">{{ __('Please Select Status') }}</option>
                                    @php
                                        $categoroy_array = App\ApiCategory::where('api_category_status', "!=", 2)->get();
                                    @endphp
                                    @foreach ($categoroy_array as $key => $cat)
                                        <option value="{{ 'CAT-' . __($cat->api_category_id) }}">{{ __($cat->api_category_title) }}</option>
                                    @endforeach
                                </select>
                                <small class="error_edit_lead_meta_intrest text-danger"></small>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-lg-1">
                            <div class="form-group">
                                <label for="edit_lead_meta_status">{{ __('Lead FollowUp Status') }} <span class="text-danger">*</span></label>
                                <select id="edit_lead_meta_status" name="edit_lead_meta_status" class="form-control input-fields">
                                    <option value="">{{ __('Please Select Status') }}</option>
                                    <option value="0">{{ __('Pending') }}</option>
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="2">{{ __('Completed') }}</option>
                                    <option value="3">{{ __('Canceled') }}</option>
                                    <option value="4">{{ __('Deleted') }}</option>
                                </select>
                                <small class="error_edit_lead_meta_status text-danger"></small>
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
    <!-- Start datatable js -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.lead_meta_edit_btn', function() {
                var el = $(this);
                var form = $('#lead_meta_edit_modal_form');
                var permission = el.data('permission');
                form.find('#edit_lead_meta_id').val(el.data('lead_meta_id'));
                form.find('#edit_lead_meta_intrest').val(el.data('lead_intrest'));
                // form.find('#edit_lead_meta_intrest_name').val(el.data('intrest_name'));
                form.find('#edit_lead_meta_status').val(el.data('status'));
            });
            
            $(document).on('click','#bulk_delete_btn',function (e) {
                e.preventDefault();

                var bulkOption = $('#bulk_option').val();
                var allCheckbox =  $('.bulk-checkbox:checked');
                var allIds = [];
                allCheckbox.each(function(index,value){
                    allIds.push($(this).val());
                });
                if(allIds != '' && bulkOption == 'delete'){
                    $(this).text('{{__('Deleting...')}}');
                    $.ajax({
                        'type' : "POST",
                        'url' : "{{route('admin.page.bulk.action')}}",
                        'data' : {
                            _token: "{{csrf_token()}}",
                            ids: allIds
                        },
                        success:function (data) {
                            location.reload();
                        }
                    });
                }

            });

            $('.all-checkbox').on('change',function (e) {
                e.preventDefault();
                var value = $('.all-checkbox').is(':checked');
                var allChek =$(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                if( value == true){
                    allChek.prop('checked',true);
                }else{
                    allChek.prop('checked',false);
                }
            });

            $('.table-wrap > table').DataTable({
                "order": [[ 1, "asc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    'orderable' : false
                }]
            });

            $('#submit-api-details').click(function(e) {
                e.preventDefault();
                let submit_url = "{{ route('lead.update') }}";
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
                            Swal.fire({
                                title: response.message,
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            if(response.status_code == 400){
                                $.each(response.message, function (indexInArray, valueOfElement) { 
                                    console.log(indexInArray, valueOfElement);
                                    $(`.error_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(2000).fadeOut();
                                });
                            } else {
                                location.reload();
                            }
                        }
                    }
                });

            });

            $('#edit-technology').click(function(e) {
            e.preventDefault();
            let submit_url = "{{ route('lead.meta.update') }}";

            let lead_meta_id = $(`#edit_lead_meta_id`).val();
            let lead_meta_intrest = $(`#edit_lead_meta_intrest`).val();
            let lead_meta_status = $(`#edit_lead_meta_status`).val();

            let form_data = {
                lead_meta_id: lead_meta_id,
                lead_intrest: lead_meta_intrest,
                lead_status: lead_meta_status,
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
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        if (response.status_code == 400) {
                            $.each(response.message, function(indexInArray, valueOfElement) {
                                $(`.error_edit_${indexInArray}`).html(valueOfElement[0]).fadeIn().delay(5000).fadeOut();
                            });
                        }
                    }
                }
            });

        });
        } );
    </script>
@endsection
