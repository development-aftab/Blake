@extends('layouts.master')

@push('css')
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
@endpush

@section('content')
        <div class="container-fluid">
            <div class="row" style="overflow: auto hidden;">
                {{-- <div class="col-md-8 col-md-offset-2 col-sm-12"> --}}
                    <iframe src="{{url('forums')}}" height="850px" width="100%" title="Iframe Example" style="border: 0 !important"></iframe>
                {{-- </div> --}}
            </div>
        </div>
@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

@endpush