@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">PaymentDetail {{ $paymentdetail->id }}</h3>
                    @can('view-'.str_slug('PaymentDetail'))
                        <a class="btn btn-success pull-right" href="{{ url('/paymentDetail/payment-detail') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $paymentdetail->id }}</td>
                            </tr>
                            <tr><th> User Id </th><td> {{ $paymentdetail->user_id }} </td></tr><tr><th> Package Id </th><td> {{ $paymentdetail->package_id }} </td></tr><tr><th> Amount </th><td> {{ $paymentdetail->amount }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

