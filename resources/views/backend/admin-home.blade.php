@extends('backend.admin-master')
@section('site-title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            @if (auth()->user()->role == 1)
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Active APIs') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Api Sr') }}</th>
                                        <th>{{ __('API Title') }}</th>
                                        <th>{{ __('API Type') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @php $sr = 0; @endphp
                                        @foreach ($apiList as $key => $data)
                                            <tr>
                                                <td>#{{ ++$sr }}</td>
                                                <td>{{ $data->api_title }}</td>
                                                <td>
                                                    @if ($data->api_type == '1')
                                                        <span class="alert alert-success">{{ __('PAID') }}</span>
                                                    @elseif($data->api_type == '0')
                                                        <span class="alert alert-warning">{{ __('FREE') }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Active Users') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('User ID') }}</th>
                                        <th>{{ __('User Name') }}</th>
                                        <th>{{ __('User Details') }}</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#01</td>
                                            <td>ABC PQR</td>
                                            <td>
                                                <span>8460861111</span><br>
                                                <span>pqr@gmail.com</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#03</td>
                                            <td>XYZ DEF</td>
                                            <td>
                                                <span>9990861417</span><br>
                                                <span>def@gmail.com</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#03</td>
                                            <td>Divyesh Sarvaiya</td>
                                            <td>
                                                <span>8460861417</span><br>
                                                <span>abc@gmail.com</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('New Leads') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Lead Info') }}</th>
                                        <th>{{ __('Contact Details') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @php $sr = 0; @endphp
                                        @foreach ($Leads as $key => $data)
                                            <tr>
                                                <td>#{{ ++$sr }}</td>
                                                <td>
                                                    {{ $data->lead_name }}<br>
                                                    {{ $data->lead_occupation }}
                                                </td>
                                                <td>
                                                    {{ $data->lead_email }}<br>
                                                    {{ $data->lead_mobile }}
                                                </td>
                                                <td>
                                                    {{ $data->lead_intrest }}
                                                </td>
                                                <td>
                                                    @if ($data->lead_meta_status == '0')
                                                            <div class="btn btn-outline-primary">{{ __('Pending') }}</div>
                                                        @elseif($data->lead_meta_status == '1')
                                                            <div class="btn btn-outline-warning">{{ __('InProgress') }}</div>
                                                        @elseif($data->lead_meta_status == '2')
                                                            <div class="btn btn-outline-success">{{ __('Complete') }}</div>
                                                        @elseif($data->lead_meta_status == '3')
                                                            <div class="btn btn-outline-light">{{ __('CancelED') }}</div>
                                                        @elseif($data->lead_meta_status == '4')
                                                            <div class="btn btn-outline-danger">{{ __('Deleted') }}</div>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Recent Success Api') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Recent Failed Api') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Service List') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Near Expiry Users') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->role == 4)
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Active APIs') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Recent Success Api') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Recent Failed Api') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('Service List') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Package Name') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($package_recent_order as $data)
                                            <tr>
                                                <td>#{{ $data->id }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    @php $pay_status = $data->payment_status; @endphp
                                                    @if ($pay_status == 'complete')
                                                        <span class="alert alert-success">{{ __($pay_status) }}</span>
                                                    @elseif($pay_status == 'pending')
                                                        <span class="alert alert-warning">{{ __($pay_status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ date_format($data->created_at, 'd M Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
