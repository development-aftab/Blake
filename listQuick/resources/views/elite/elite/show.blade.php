@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Elite {{ $elite->id }}</h3>
                    @can('view-'.str_slug('Elite'))
                        <a class="btn btn-success pull-right" href="{{ url('/elite/elite') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $elite->id }}</td>
                            </tr>
                            <tr>
                                <th> Heading </th>
                                <td> {{ $elite->heading??"" }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {!! $elite->description??"" !!} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                @include('includes.image_html',['variable'=>$elite->image??""])
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$elite->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

