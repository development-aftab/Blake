@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Topic {{ $chattertopic->id }}</h3>
                    @can('view-'.str_slug('ChatterTopic'))
                        <a class="btn btn-success pull-right" href="{{ url('/chatterTopic/chatter-topic') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $chattertopic->id }}</td>
                            </tr>
                            <tr><th> Order </th><td> {{ $chattertopic->order }} </td></tr><tr><th> Topic </th><td> {{ $chattertopic->name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

