@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">UserPayment {{ $userpayment->id }}</h3>
                    @can('view-'.str_slug('UserPayment'))
                        <a class="btn btn-success pull-right" href="{{ url('/userPayment/user-payment') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $userpayment->id??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> User Name </th>
                                <td> {{ $userpayment->getUserDetail->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Amount </th>
                                <td> {{ $userpayment->amount??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Amount Captured </th>
                                <td> {{ $userpayment->amount_captured??"Not Available" }} </td>
                            </tr>
                            <!-- <tr>
                                <th> Amount Refunded </th>
                                <td> {{ $userpayment->amount_refunded??"Not Available" }} </td>
                            </tr> -->
                            <!-- <tr>
                                <th> Captured </th>
                                <td> {{ $userpayment->captured??"Not Available" }} </td>
                            </tr> -->
                            <tr>
                                <th> Currency </th>
                                <td> {{ $userpayment->currency??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Description</th>
                                <td> {{ $userpayment->description??"Not Available" }} </td>
                            </tr>
                            <!-- <tr>
                                <th> Outcome </th>
                                <td> {{ $userpayment->outcome??"Not Available" }} </td>
                            </tr> -->
                            <!-- <tr>
                                <th> Paid </th>
                                <td> {{ $userpayment->paid??"Not Available" }} </td>
                            </tr> -->
                            <!-- <tr>
                                <th> Payment Method Details </th>
                                <td> {{ $userpayment->payment_method_details??"Not Available" }} </td>
                            </tr> -->
                            <tr>
                                <th> Receipt Url </th>
                                <td> <a target="_blank" href="{{ $userpayment->receipt_url}}">{{ $userpayment->receipt_url??"Not Available" }}</a>  </td>
                            </tr>
                            <!-- <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$userpayment->status??""])
                            </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

