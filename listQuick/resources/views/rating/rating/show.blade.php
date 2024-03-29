@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Rating {{ $rating->id }}</h3>
                    @can('view-'.str_slug('Rating'))
                        <a class="btn btn-success pull-right" href="{{ url('/rating/rating') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $rating->id }}</td>
                            </tr>
                            <tr><th> Rating By </th><td> {{ $rating->rating_by }} </td></tr><tr><th> Rating To </th><td> {{ $rating->rating_to }} </td></tr><tr><th> Rating </th><td> {{ $rating->rating }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

