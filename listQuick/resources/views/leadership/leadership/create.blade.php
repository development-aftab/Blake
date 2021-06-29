@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Leadership</h3>
                    @can('view-'.str_slug('Leadership'))
                    <a  class="btn btn-success pull-right" href="{{url('/leadership/leadership')}}"><i class="icon-arrow-left-circle"></i> Add Leadership</a>
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

                    <form method="POST" action="{{ url('/leadership/leadership') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('leadership.leadership.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
