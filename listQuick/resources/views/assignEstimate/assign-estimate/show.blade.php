@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">AssignEstimate {{ $assignestimate->id }}</h3>
                    @can('view-'.str_slug('AssignEstimate'))
                        <a class="btn btn-success pull-right" href="{{ url('/assignEstimate/assign-estimate') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $assignestimate->id }}</td>
                            </tr>
                            <tr><th> Estimate Id </th><td> {{ $assignestimate->estimate_id }} </td></tr><tr><th> Agent Id </th><td> {{ $assignestimate->agent_id }} </td></tr><tr><th> Status </th><td> {{ $assignestimate->status }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

