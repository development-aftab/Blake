@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Page {{ $page->id }}</h3>
                    @can('view-'.str_slug('Page'))
                        <a class="btn btn-success pull-right" href="{{ url('/page/page') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $page->id??"Not Available" }}</td>
                            </tr>
                            <tr>
                                <th> Heading </th>
                                <td> {{ $page->heading??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {!! $page->description??"Not Available" !!} </td>
                            </tr>
                            
                            <tr>
                                <th> Slug </th>
                                <td> {{ $page->slug??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$page->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

