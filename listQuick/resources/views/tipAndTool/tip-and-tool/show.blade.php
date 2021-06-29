@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">TipAndTool {{ $tipandtool->id }}</h3>
                    @can('view-'.str_slug('TipAndTool'))
                        <a class="btn btn-success pull-right" href="{{ url('/tipAndTool/tip-and-tool') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $tipandtool->id }}</td>
                            </tr>
                            <tr>
                                <th> Title </th>
                                <td> {{ $tipandtool->title }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img style="width: 158px;" src="{{ asset('website').'/'.$tipandtool->image??'Not Available' }}">  </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$tipandtool->status??""])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

