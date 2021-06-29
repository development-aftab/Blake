@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Home Estimate {{ $homeextimate->id }}</h3>
                    @can('view-'.str_slug('HomeExtimate'))
                        <a class="btn btn-success pull-right" href="{{ url('/homeExtimate/home-extimate') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $homeextimate->id }}</td>
                            </tr>
                             <tr><th> Name </th><td> {{ $homeextimate->name??'' }} </td></tr>
                            <tr><th> Email </th><td> {{ $homeextimate->email??'' }} </td></tr>
                            <tr><th> Phone </th><td> {{ $homeextimate->phone??'' }} </td></tr> 

                            <tr><th> State </th><td> {{ $homeextimate->state??'' }} </td></tr>
                            <tr><th> Location </th><td> {{ $homeextimate->location??'' }} </td></tr>
                            <tr><th> Confirm Location </th><td> {{ $homeextimate->confirm_location??'' }} </td></tr>  
                            <tr><th> thinking of selling soon </th><td> {{ $homeextimate->selling_time??'' }} </td></tr>
                            <tr><th> condition of home </th><td> {{ $homeextimate->getconditionDetails->title??'' }} </td></tr>
                             <tr><th> contract with Agent</th><td> {{ $homeextimate->contract??'' }} </td></tr>
                             <tr><th>Anything else</th><td> {{ $homeextimate->other??'' }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

