@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Worth {{ $worth->id }}</h3>
                    @can('view-'.str_slug('Worth'))
                        <a class="btn btn-success pull-right" href="{{ url('/worth/worth') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $worth->id }}</td>
                            </tr>
                            <tr>
                                <th> Price </th>
                                <td> {{ $worth->price }} </td>
                            </tr>
                            <tr>
                                <th> Currency </th>
                                <td> {{ $worth->currency }} </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$worth->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

