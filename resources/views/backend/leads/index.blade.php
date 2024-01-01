@extends('backend.admin-master')
@section('site-title')
    {{__('All Leads')}}
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
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="header-title">{{__('All Pages')}}</h4> --}}
                        <div class="d-flex justify-content-between">
                            <div class="bulk-delete-wrapper my-0">
                                <div class="select-box-wrap">
                                    <select name="bulk_option" id="bulk_option">
                                        <option value="">{{{__('Bulk Action')}}}</option>
                                        <option value="delete">{{{__('Delete')}}}</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="table-wrap table-responsive">
                                <table class="table table-default">
                                    <thead>
                                        <th class="no-sort">
                                            <div class="mark-all-checkbox">
                                                <input type="checkbox" class="all-checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('User Details')}} </th>
                                        <th>{{__('Occupation & Intrest')}} </th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Created At & Updated At')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($lead_list as $key => $data)
                                    @php
                                        $intrest = (isset($data->meta_details[0])) ? $data->meta_details[0]['intrest'] : 'Reguler Leads';
                                    @endphp
                                        <tr>
                                            <td>
                                                <div class="bulk-checkbox-wrapper">
                                                    <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{ $data->lead_id }}">
                                                </div>
                                            </td>
                                            <td>{{ $data->lead_id }}</td>
                                            <td>
                                                <span class="font-weight-bold">{{$data->lead_name}} </span><br>
                                                <span class="font-weight-bold">{{$data->lead_email}} </span><br>
                                                <span class="font-weight-bold">{{$data->lead_mobile}} </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold">{{$data->lead_occupation}} </span><br>
                                                <span class="font-weight-bold">{{$intrest}}</span>
                                            </td>
                                            <td>
                                                @php
                                                        $status = 'Pending';
                                                        $status_color = 'secondary';
                                                        if($data->lead_status == 1){
                                                            $status_color = 'info';
                                                            $status = 'Active';
                                                        } else if($data->lead_status == 2){
                                                            $status_color = 'success';
                                                            $status = 'Completed';
                                                        } else if($data->lead_status == 3){
                                                            $status_color = 'warnign';
                                                            $status = 'Canceled';
                                                        } else if($data->lead_status == 4){
                                                            $status_color = 'danger';
                                                            $status = 'Deleted';
                                                        }
                                                        
                                                    @endphp
                                                    <span class="badge badge-{{$status_color}} p-1">{{__($status)}}</span>
                                            </td>
                                            <td>{{$data->created_at->format('d M,Y H:i A')}} <br> {{$data->updated_at->format('d M,Y H:i A')}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary btn-sm mb-3 mr-1" href="{{route('lead.edit',['id' => $data->lead_id ])}}">
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


            $('.table-wrap > table').DataTable( {
                "order": [[ 1, "asc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    'orderable' : false
                }]
            } );
        } );
    </script>
@endsection
