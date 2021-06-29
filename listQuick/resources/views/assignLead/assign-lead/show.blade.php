@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">AssignLead {{ $assignlead->id }}</h3>
                    @can('view-'.str_slug('AssignLead'))
                        <a class="btn btn-success pull-right" href="{{ url('/assignLead/assign-lead') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $assignlead->id }}</td>
                            </tr>
                            <tr><th> Buy Sale Property Id </th><td> {{ $assignlead->buy_sale_property_id }} </td></tr><tr><th> Agent Id </th><td> {{ $assignlead->agent_id }} </td></tr><tr><th> Status </th><td> {{ $assignlead->status }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

