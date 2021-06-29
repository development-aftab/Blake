@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Subscriber {{ $subscriber->id }}</h3>
                    @can('view-'.str_slug('Subscriber'))
                        <a class="btn btn-success pull-right" href="{{ url('/subscriber/subscriber') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $subscriber->id }}</td>
                            </tr>
                            <tr><th> First Name </th><td> {{ $subscriber->first_name }} </td></tr><tr><th> Last Name </th><td> {{ $subscriber->last_name }} </td></tr><tr><th> Email </th><td> {{ $subscriber->email }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

