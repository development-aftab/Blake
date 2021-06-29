@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Office {{ $office->id }}</h3>
                    @can('view-'.str_slug('Office'))
                        <a class="btn btn-success pull-right" href="{{ url('/office/office') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $office->id??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $office->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Location </th>
                                <td> {{ $office->location??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $office->description??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Lat </th>
                                <td> {{ $office->lat??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Lng </th>
                                <td> {{ $office->lng??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img style="width: 158px;" src="{{ asset('website').'/'.$office->image??'Not Available' }}">  </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$office->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

