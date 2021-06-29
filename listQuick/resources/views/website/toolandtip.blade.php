@extends('website.layout.master')
@section('content')
    <!-- <section class="learn-more">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 learn-more-box">
                    <p class="text-white learn-more-p">
                        Have questions about buying or selling homes during COVID-19? - <a href="">Learn more <i class="fas fa-angle-double-right"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </section> -->

    <style type="text/css">
        .description {
    font-size: 18px;
}

.title {
    font-weight: 600;
}
    </style>
@foreach($TipAndTool as $TipAndTool)
    <section class="perfect-real-state">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <img class="img-fluid" src="{{ asset('website') }}/{{$TipAndTool->image}}">
                    <h3 class="title">{!!$TipAndTool->title!!}</h3>
                    <p class="description">{!!$TipAndTool->description!!}</p>
                </div>

            </div>
        </div>
    </section>
@endforeach
    

@endsection


@push('js')

@endpush