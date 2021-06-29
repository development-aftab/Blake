@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Time {{ $time->id }}</h3>
                    @can('view-'.str_slug('Time'))
                        <a class="btn btn-success pull-right" href="{{ url('/time/time') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $time->id }}</td>
                            </tr>
                            <tr><th> Duration </th><td> {{ $time->duration }} </td></tr>
                            <tr><th> Status </th> @include('includes.status_badge_html',['variable'=>$time->status??''])</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

