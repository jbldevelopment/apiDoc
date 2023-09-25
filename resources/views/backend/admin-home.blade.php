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
                            <h4 class="title">{{ __('Active Users') }}</h4>
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
                <div class="col-lg-12">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{ __('New Leads') }}</h4>
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
