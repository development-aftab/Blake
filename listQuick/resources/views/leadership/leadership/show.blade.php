@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Leadership {{ $leadership->id }}</h3>
                    @can('view-'.str_slug('Leadership'))
                        <a class="btn btn-success pull-right" href="{{ url('/leadership/leadership') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $leadership->id }}</td>
                            </tr>
                            <tr>
                                <th> Type Name </th>
                                <td> {{ $leadership->getTypeName->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $leadership->name??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $leadership->description??"Not Available" }} </td>
                            </tr>
                            <tr>
                                <th> Image </th>
                                <td> <img style="width: 158px;" src="{{ asset('website').'/'.$leadership->image??'Not Available' }}"> </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                @include('includes.status_badge_html',['variable'=>$leadership->status??''])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

