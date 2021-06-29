@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Testimonial {{ $testimonial->id }}</h3>
                    @can('view-'.str_slug('Testimonial'))
                        <a class="btn btn-success pull-right" href="{{ url('/testimonial/testimonial') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $testimonial->id }}</td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $testimonial->name }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $testimonial->description }} </td>
                            </tr>
                            <tr>
                                <th> Location </th>
                                <td> {{ $testimonial->location }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img style="width: 158px;" src="{{ asset('website').'/'.$testimonial->image??'Not Available' }}">  </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$testimonial->status??""])
                                
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

