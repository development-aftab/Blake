@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Press {{ $press->id }}</h3>
                    @can('view-'.str_slug('Press'))
                        <a class="btn btn-success pull-right" href="{{ url('/press/press') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $press->id }}</td>
                            </tr>
                            <tr><th> Title </th>
                                <td> {{ $press->title }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {!!  $press->description !!} </td>
                            </tr>
                            <!-- <tr>
                                <th> Image </th>
                                @include('includes.image_html',['variable'=>$press->image??"Not Available"])
                            </tr> -->
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$press->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

