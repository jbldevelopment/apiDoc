@extends('backend.admin-master')
@section('site-title')
    {{__('All Categories')}}
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
        /* .desc {
            display: block;
            width: 100px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        } */
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
                        <h4 class="header-title">{{__('All Pages')}}</h4>
                        <div class="d-flex justify-content-between">
                            <div class="bulk-delete-wrapper my-0">
                                <div class="select-box-wrap">
                                    <select name="bulk_option" id="bulk_option">
                                        <option value="">{{{__('Bulk Action')}}}</option>
                                        <option value="0">{{{__('Deactive')}}}</option>
                                        <option value="1">{{{__('Active')}}}</option>
                                        <option value="2">{{{__('Delete')}}}</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="{{route('category.create')}}">
                                {{__('Add New Category')}}
                            </a>
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
                                        <th>{{__('Title')}} </th>
                                        <th>{{__('IMG')}} </th>
                                        <th>{{__('Order')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Created At & Updated At')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_page as $key => $data)
                                    @php
                                    $api_category_icon = asset('storage/image/category/icon/'.$data->api_category_icon);
                                    $api_bg_img_url = asset('storage/image/category/'.$data->api_bg_img_url);
                                    @endphp
                                        <tr>
                                            <td>
                                                <div class="bulk-checkbox-wrapper">
                                                    <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{ $data->api_category_id }}">
                                                </div>
                                            </td>
                                            <td>{{ $data->api_category_id }}</td>
                                            <td>
                                                <span class="font-weight-bold">{{$data->api_category_title}} </span>
                                            </td>
                                            <td>
                                                @if (!file_exists($api_category_icon))
                                                    <img class="img-fluid" width="50" height="50" src="{{$api_category_icon}}" alt="{{$data->api_category_icon}}">
                                                    <img class="img-fluid" width="50" height="50" src="{{$api_bg_img_url}}" alt="{{$data->api_bg_img_url}}">
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-success">{{$data->api_category_order}}</span>
                                            </td>
                                            <td>
                                                @if($data->api_category_status === 1)
                                                    <span class="alert alert-success p-1">{{__('Active')}}</span>
                                                @else
                                                    <span class="alert alert-danger p-1">{{__('Deactive')}}</span>
                                                @endif
                                            </td>
                                            <td>{{$data->created_at->format('d M,Y H:i A')}} <br> {{$data->updated_at->format('d M,Y H:i A')}}</td>
                                            <td>
                                                <x-delete-popover :url="route('category.delete', $data->api_category_id )"/>
                                                <a class="btn btn-xs btn-primary btn-sm mb-3 mr-1" href="{{route('category.edit',['slug' => $data->api_category_slug ])}}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a class="btn btn-xs btn-info btn-sm mb-3 mr-1" target="_blank" href="{{route('frontend.dynamic.category',['slug' => $data->api_category_slug ])}}">
                                                    <i class="ti-eye"></i>
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
                if(allIds != '' && bulkOption != ''){
                    $(this).text("{{__('Proccessing...')}}");
                    $.ajax({
                        'type' : "POST",
                        'url' : "{{route('category.bulk.action')}}",
                        'data' : {
                            _token: "{{csrf_token()}}",
                            ids: allIds,
                            action: bulkOption
                        },
                        success:function (response) {
                            Swal.fire({
                                title: response.message,
                                icon: (response.success) ? 'success' : 'error',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if(response.success){
                                        location.reload();
                                    }
                                }
                            });
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
                "order": [[ 1, "desc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    'orderable' : false
                }]
            } );
        } );
    </script>
@endsection
