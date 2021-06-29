@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Review {{ $review->id }}</h3>
                    @can('view-'.str_slug('Review'))
                        <a class="btn btn-success pull-right" href="{{ url('/review/review') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $review->id }}</td>
                            </tr>
                            <tr>
                                <th> Reviewed By </th>
                                <td> {{ $review->getReviewedByName->name??''}} </td>
                            </tr>
                            <tr>
                                <th> Reviewed To </th>
                                <td> {{ $review->getReviewedToName->name??'' }} </td>
                            </tr>
                            <tr>
                                <th> Revieweer Name </th>
                                <td> {{ $review->revieweer_name }} </td>
                            </tr>

                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$review->status??''])
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

