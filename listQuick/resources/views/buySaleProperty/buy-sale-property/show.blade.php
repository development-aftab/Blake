@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">@if(Session::get('request_type') == "sale") Seller  @else Buyer  @endif Lead {{ $buysaleproperty->id }}</h3>
                    @can('view-'.str_slug('BuySaleProperty'))
                        <a class="btn btn-success pull-right" href="{{ url('/buySaleProperty/buy-sale-property') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $buysaleproperty->id??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> Location </th>
                                <td> {{ $buysaleproperty->location??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Confirm Location </th>
                                <td> {{ $buysaleproperty->confirm_location??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Unit Number </th>
                                <td> {{ $buysaleproperty->unit_number??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Property Type </th>
                                <td> {{ $buysaleproperty->getPropertyTypeDetail->title??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Worth </th>
                                <td> {{ $buysaleproperty->getWorthDetail->price??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Sale Time </th>
                                <td> {{ $buysaleproperty->getSaleTimeDetail->duration??"Not Available" }} </td>
                            </tr>
                            <tr>
                            <tr>
                                <th> Heard Source </th>
                                <td> {{ $buysaleproperty->getHeardSourceDetail->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Agent </th>
                                <td> {{ $buysaleproperty->getAgentDetail->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Requester Name </th>
                                <td> {{ $buysaleproperty->requester_name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Requester Phone </th>
                                <td> {{ $buysaleproperty->requester_phone??"Not Available" }} </td>
                            </tr>
{{--                            <tr>
                                <th> Status </th>
                                 @include('includes.status_badge_html',['variable'=>$buysaleproperty->status??'']) 
                            </tr>--}}
                            
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

