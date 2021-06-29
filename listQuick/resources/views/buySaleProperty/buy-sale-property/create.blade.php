@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New BuySaleProperty</h3>
                    @can('view-'.str_slug('BuySaleProperty'))
                    <a  class="btn btn-success pull-right" href="{{url('/buySaleProperty/buy-sale-property')}}"><i class="icon-arrow-left-circle"></i> Add BuySaleProperty</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/buySaleProperty/buy-sale-property') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('buySaleProperty.buy-sale-property.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
