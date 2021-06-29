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

  <section id="hire-agent-section-banner">
    <div class="container">
      <h3>Hire The Perfect Real Estate</h3>
      <h3>Agent In Your Area</h3>
    </div>

    <div id="div1" class="container agent-card-container">
      <div class="row">
        @foreach($agents as $agent)
{{--            {{var_dump(strtolower(trim(strstr($agent->profile->address??'', ',', true)))  .'---'. strtolower(trim($state)))}}--}}
          @if($state=="")
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="bg-dark agent-card">
                <div class="row-1 agent-card-title">
                    @if(isset($agent->profile) && $agent->profile->pic != null)
                        <div><img style="width: 70px; height: 70px; border-radius:50%; " src="{{asset('storage/uploads/users/'.$agent->profile->pic??'Not Available')}}" /></div>
                    @else
                        <div><img style="width: 70px; height: 70px; border-radius:50%; " src="{{asset('storage/uploads/users/no_avatar.jpg')}}" /></div>
                    @endif
                  <div class="black-box-heading">
                    <h4 class="text-white lorem-heading">{{ $agent->name??"" }}</h4>

                    <p class="text-white lorem-para"> {{ $agent->profile->state??"Not available" }}</p>
                    <p class="text-white lorem-para"> {{ strstr($agent->profile->address??'Not Available', ',', true)??"Not available" }}</p>
                    {{-- <p class="text-white lorem-para"> {{ strtolower(trim(strstr($agent->profile->address, ',', true))) }}</p> --}}
                    <img src="{{asset('website/image/star.png')}}" class="star" />
                  </div>
                </div>
                <div class="row agent-card-body">
                    <div class="div-1">
                        <h3 class="text-white heading-1">{{ $agent->profile->area_sales??"0" }}</h3>
                        <p class="text-white para-1">Number of<br />Transactions Last Year</p>
                    </div>
                    <div class="div-2">
                        <h3 class="text-white heading-1">{{ $agent->profile->out_area_sales??"0" }}</h3>
                        <p class="text-white para-1">Years in<br />Marketplace</p>
                    </div>

                    <div class="div-3">
                        <h3 class="text-white heading-1">{{ $agent->profile->condo??"0" }}</h3>
                        <p class="text-white para-1">Average Days<br />on Market</p>
                    </div>

{{--                    <div class="div-1">
                    <h3 class="text-white heading-1">{{ $agent->profile->area_sales??"0" }}</h3>
                    <p class="text-white para-1">Single Family<br />Home Transactions.</p>
                  </div>
                  <div class="div-2">
                    <h3 class="text-white heading-1">{{ $agent->profile->out_area_sales??"0" }}</h3>
                    <p class="text-white para-1">Townhouse<br />Transactions.</p>
                  </div>
                  <?php
                    if(isset($agent->profile))
                        $total =    $agent->profile->out_area_sales??0 + $agent->profile->area_sales??0;
                    $total=0;
                  ?>
                  <div class="div-3">
                    <h3 class="text-white heading-1">{{$total}}</h3>
                    <p class="text-white para-1">condo<br />Transaction.</p>
                  </div>--}}
                </div>
              </div>
            </div>
          @elseif(strtolower(trim(strstr($agent->profile->address??'', ',', true))) == strtolower(trim($state)))
         {{-- @endif
          @if(strtolower(trim(strstr($agent->profile->address??'', ',', true))) == strtolower(trim($state)))--}}
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="bg-dark agent-card">
                  <div class="row-1 agent-card-title">
                      @if(isset($agent->profile) && $agent->profile->pic != null)
                          <div><img style="width: 70px; height: 70px; border-radius:50%; " src="{{asset('storage/uploads/users/'.$agent->profile->pic??'Not Available')}}" /></div>
                      @else
                          <div><img style="width: 70px; height: 70px; border-radius:50%; " src="{{asset('storage/uploads/users/no_avatar.jpg')}}" /></div>
                      @endif
                    <div class="black-box-heading">
                      <h4 class="text-white lorem-heading">{{ $agent->name??"" }}</h4>

                      <p class="text-white lorem-para"> {{ $agent->profile->state??"Not available" }}</p>
                      <p class="text-white lorem-para"> {{ strstr($agent->profile->address??'Not Available', ',', true)??"Not available" }}</p>

                      <img src="{{asset('website/image/star.png')}}" class="star" />
                    </div>
                  </div>
                 <div class="row agent-card-body">
                  <div class="div-1">
                    <h3 class="text-white heading-1">{{ $agent->profile->area_sales??"0" }}</h3>
                    <p class="text-white para-1">Number of<br />Transactions Last Year</p>
                  </div>
                  <div class="div-2">
                    <h3 class="text-white heading-1">{{ $agent->profile->out_area_sales??"0" }}</h3>
                    <p class="text-white para-1">Years in<br />Marketplace</p>
                  </div>

                  <div class="div-3">
                    <h3 class="text-white heading-1">{{ $agent->profile->condo??"0" }}</h3>
                    <p class="text-white para-1">Average Days<br />on Market</p>
                  </div>
                </div>
                </div>
              </div>
          @endif
        @endforeach
      </div>
      @if($state=="")
        {{$agents->links()}}
      @endif
    </div>
  </section>


@endsection
@section('externalJsLinks')

@endsection
@push('js')


@endpush