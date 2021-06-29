@extends('website.layout.master')

@section('content')
<section id="section-testimonial-banner">
    <div class="container card-row">
      <div class="row">
        <div class="col-lg-12">
          {{--<h3>ListQuick Is A 100% Free And Unbiased Service.</h3>
          <h3>Make More Informed Decisions About Your Home.</h3>

          <p>Top real estate agents sell homes faster and for more money. Now, it’s easy to find them. We analyze millions of real estate transactions to compare real estate agents near you on the metrics that matter: how well they sell homes like yours.</p>
          <p>
            Get free, objective, performance-based recommendations for top real estate agents in your neighborhood.
          </p>--}}
          {!! $testimonialPageContent->description??"Not Available" !!}

          {{--<form method="post" action="{{route('sale')}}">
            @csrf
            <input type="hidden" name="latitude" id="latitude" class="form-control">
            <input type="hidden" name="longitude" id="longitude" class="form-control">
            <input type="text" required name="find_an_agent" id="find_an_agent" class="find-search-header" placeholder="Enter Your Address">
            <button type="submit" class="find-btn-header" >Find an Agent</button>
          </form>
--}}
          <form class="find-agent-form" method="post" action="{{route('mailchimp_subscribe')}}" id="tafSaleForm">
            @csrf
            <input type="text" required name="subscriber_name" id="subscriber_name" data-show="down" class="find-search-header" placeholder="Enter Full Name" required>
            <input type="text" required name="subscriber_email" id="subscriber_email" data-show="down" class="find-search-header" placeholder="Enter Email Address" required>
            <button type="submit" class="find-btn-header" >Subscribe</button>
          </form>

{{--          <form class="form-inline" method="post" action="{{route('sale')}}">
            @csrf
            <input type="hidden" name="latitude" id="latitude" class="form-control">
            <input type="hidden" name="longitude" id="longitude" class="form-control">
            <div class="form-group custom-search-bar shadow">
              <input type="text" required name="autocomplete" id="autocomplete" class="find-search-header" placeholder="Enter Your Address">
              --}}{{--<input class="form-control" type="text" placeholder="Enter your address" id="autocomplete" />--}}{{--
              <button style="color: white" type="submit" class="btn find-agent-btn">Find an Agent</button>
            </div>
          </form>--}}
        </div>
      </div>
    </div>
  </section>

  <section class="" id="section-first">
    <div class="container testimonial-card-row">
      <!--=====================CARD CONTAINER START==============================-->
      <div class="row">
        @foreach($testimonials as $testimonial)
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card2 shadow">
            <img src="{{asset('website').'/'.$testimonial->image??'Not Available'}}" alt="" style="height: 252px; width: 348px;"/> 
            <div class="testimonial-card-body2">
              <div class="testimonial-text-area2">
                <p>{!! $testimonial->description??"Not Available" !!}</p>

                <h5>{{$testimonial->name??"Not Available"}}</h5>
                <p>{{$testimonial->location??"Not Available"}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!--CARD ROW END HERE-->
    </div>
    <!--=====================CARD CONTAINER END==============================-->

    <!-- <div class="container testimonial-card-row">
      <div class="select-sellers">
        <select class="form-control">
          <option>Sellers</option>
          <option>Buyer</option>
        </select>
      </div>
    </div> -->
  </section>

  <section class="feedback">
    <!--====================FEEDBACK SECTION===========================-->
    <div class="container">
      @foreach($reviews as $item)
        <div class="feedback-card testimonial-card-row">      
          <div class="row1">
            <div class="col10-left">
              <a href="#">
                <div class="img-container">
                  <img src="{{asset('website/image/blue.png')}}" alt="" />
                  <div class="img-text">{{ $item->revieweer_name[0] }}</div>
                </div>
              </a>
            </div>
            <div class="col10">
              <p>{{$item->created_at->format('D d-M')??''}}</p>
            </div>
          </div>

          <div class="row2">
            <div class="col10">
              <blockquote>{!! $item->message??''!!}</blockquote>
            </div>
            <div class="col10">
              <a href="#"><i class="fas fa-angle-right"></i></a>
            </div>
          </div>
        </div>      
      @endforeach
{{--      {{ $reviews->links() }}--}}
    </div>
    <!--FEEDBACK CONTAINER END-->
  </section>
  <section>
    <div class="container">
      <nav aria-label="">
        <ul class="pagination justify-content-center">{{$reviews->links()}}
        </ul>
      </nav>
    </div>
  </section> 

  <section id="contact-us">
    <div class="container">
      <div class="row contact-row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <form action="{{ route('message_process') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="0"/>
            <div class="form-group">
            <input type="text" class="form-control" id="revieweer_name" name="revieweer_name" aria-describedby="emailHelp" required="required" placeholder="Full Name*" />
            <br>
            <input type="email" class="form-control" id="revieweer_email" name="revieweer_email" aria-describedby="emailHelp" required="required" placeholder="Email*" />
            <br>
            <input type="text" class="form-control" id="revieweer_location" name="revieweer_location" aria-describedby="emailHelp" required="required" placeholder="location*" />
            </div>

            <div class="form-group">
              <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message*" required="required"></textarea>
            </div>
            
            <button type="submit" style="align:center" class="btn btn-danger custom-btn-form">Leave Review</button>
          </form>
        </div>
      </div>
    </div>
  </section>
    

@endsection
@push('js')
  <script>
    google.maps.event.addDomListener(window, 'load', initializes);
    function initializes() {
      var input = document.getElementById('find_an_agent');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        $('#latitude').val(place.geometry['location'].lat());
        $('#longitude').val(place.geometry['location'].lng());
      });
    }
  </script>

@endpush