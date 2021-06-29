@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Package {{ $package->id }}</h3>
                    @can('view-'.str_slug('Package'))
                        <a class="btn btn-success pull-right" href="{{ url('/package/package') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $package->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name </th>
                                    <td> {{ $package->name }} </td>
                                </tr>
                                <tr>
                                    <th> Description </th>
                                    <td> {!!  $package->description !!} </td>
                                </tr>
                                <tr>
                                    <th> Price </th>
                                    <td> {{ $package->price }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

