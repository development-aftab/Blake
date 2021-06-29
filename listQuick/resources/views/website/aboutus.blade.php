@extends('website.layout.master')
@section('content')

<style>
  #first-section iframe.shadow {
    margin-top: 0 !important;
  }

  .right-text-container P {
    margin-bottom: 0 !important;
  }
  .office-card-img {
    margin: 0 !important;
  }




</style>
  <!--ammar-->
  <section id="first-section">
    <div class="container">
      <div class="highlight-container card-row">
        <p class="highlight-text">{!! $heading_about_us->description !!}</p>
        {{-- <p class="highlight-text second-highlight-p">Buying Or Selling Their Home</p> --}}

        <div class="video">
          <!-- <iframe class="shadow" width="800" height="430"
              src="https://www.youtube.com/watch?v=hnp1pt8biD4">
              </iframe> -->
            <div class='video'>
              <script src="https://use.fontawesome.com/20603b964f.js"></script>
              <script type="text/javascript" src="https://content.jwplatform.com/libraries/LJ361JYj.js"></script>
              <script type="text/javascript">jwplayer.key = 'ypdL3Acgwp4Uh2/LDE9dYh3W/EPwDMuA2yid4ytssfI=';</script><div id="myElement"></div><script type="text/javascript">
                jwplayer("myElement").setup({
                  image: "{{ asset('website').'/image/logo.png'??'' }}",
                  aspectratio: "16:9",
                  width: '100%',
                  aspectratio: '16:9',
                  autostart: true,
                  file : "{{ asset('website').'/'.$real_estate_change->image??''}}",
                  // file : 'https://content.jwplatform.com/videos/xJ7Wcodt-cIp6U8lV.mp4',
                  abouttext: 'FILMKACA',
                  aboutlink: 'http://filmkaca.xyz',
                  tracks:[{"file":"<?php echo $cc??''; ?>","label":"Indonesia","kind":"captions","default":"true"}],
                  captions: {color: '#ffb800',fontSize: 30,backgroundOpacity: 0},
                })
              </script>
            </div>
          {{--<iframe class="shadow" width="100%" height="315" src="{{ asset('website').'/'.$real_estate_change->image??''}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
        </div>
      </div>
      <div class="row card-row">
        <div class="col-lg-7">
          <h3>{!!$real_estate_change->heading??""!!}</h3>
          <p class="left-paragraph">{!! $real_estate_change->description??"" !!}</p>
        </div>
        <div class="col-lg-5">
          <div class="right-col">
            <div class="right-text-container">
              <h6>{!!$data_driven->heading??""!!}</h6>
              <p>{!!$data_driven->description??""!!}</p>
            </div>
            <div class="right-text-container">
              <h6>{!!$unparalleled_network->heading??""!!}</h6>
              <p>{!!$unparalleled_network->description??""!!}</p>
            </div>
            <div class="right-text-container">
              <h6>{!!$operating_at_scale->heading??""!!}</h6>
              <p>{!!$operating_at_scale->description??""!!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="leadership">
    <div class="container">
      <div class="card-container">
        <div class="row leadership-card-row">
          <!--CARD ROW ONE DIV START HERE-->
         {{--  <div class="col-md-12">
            <h3>Our Leadership</h3>
          </div> --}}
          @foreach($leaderships as $leadership)
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-img">
                <img src="{{asset('website').'/'.$leadership->image??'Not Available'}}" class="card-img-top" alt="..." style="width: 286px !important;;height: 207px !important;" />
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$leadership->name??"Not Available"}}</h5>
                <p class="card-text">{{$leadership->getTypeName->name??"Not Available"}}</p>
              </div>
            </div>
          </div>
          @endforeach
          <!--ROW TWO END HERE-->
        </div>
        <!--ROW ONE DIV END HERE-->
        <!--ROW TWO DIV END HERE-->
      </div>

      {{-- <div class="button-div card-row">
        <button type="button" class="btn btn-danger custom-btn">View Open Positions</button>
        <a href="#" class="btn btn-danger custom-btn">View Open Positions</a>
      </div> --}}
    </div>
  </section>

  <section id="contact-us">
    <div class="container">
      <div class="row contact-row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3>{!!$contact_us->heading??""!!}</h3>
          <p class="contact-us-paragraph">{!!$contact_us->description??""!!}</p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          <form action="{{ route('contact_process') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="status" value="0"/>
            <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required="required" placeholder="Full Name*" />
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email*"  required="required" />
            </div>

            <div class="form-group">
              <input type="number" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Phone*" />
            </div>

            <div class="form-group">
              <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message*" required="required"></textarea>
            </div>

            <button type="submit" class="btn btn-danger custom-btn-form">Contact us</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="offices">
    <div class="container">
      <div class="row offices-row">
        <div class="col-md-12">
          <h3>Offices</h3>
        </div>
        @foreach($offices as $office)
        <div class="col-lg-6">
          <div class="office-card">
            <img src="{{asset('website').'/'.$office->image??'Not Available'}}" class="office-card-img" alt="..." />
            <div class="office-card-body">
              <h5 class="office-card-title">{{$office->location??"Not Available"}}</h5>
              <p class="office-card-text">{!!$office->description??"Not Available"!!}</p>
              <a href="http://www.google.com/maps/place/{{$office->lat}},{{$office->lng}}/@{{$office->lat}},{{$office->lng}},17z/data=!3m1!1e3" target="_blank">View on google Maps</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <!--ROW END HERE-->
    </div>
  </section>

  <!--ammar-end-->

  <section class="sell-smarter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center text-white">Thinking of Selling? We're Here For You.</h2>

          <form action="/action_page.php" class="form-footer">
            <input type="text" placeholder="Enter your Address" name="search" class="find-search-footer" />
            <button type="submit" class="find-btn-footer">Get Started</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center testimonial-heading">What Our Clients Say</h3>
          <hr class="text-center testimonial-hr" />
        </div>
      </div>
    </div>
  </section> --}}

{{--  <section id="testimonials" data-aos="fade-up">
        <div class="container-fluid">
            <div class="slider">--}}
       {{--       @foreach($reviews as $review)
                <div class="slider__item">
                  
                    <div class="slidebox">
                        <div class="slide-content">
                            <ul class="Rating-satr">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                            <p class="slide-text">{{$review->message??"Not Available"}}</p>
                            <h2 class="slide-head">{{$review->revieweer_name??"Not Available"}}</h2>
                        </div>
                    </div>
                    
                </div>
                @endforeach--}}
        <!-- <div class="slider__item">
          <div class="slidebox">
            <div class="slide-content">
              <ul class="Rating-satr">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-half-o"></i></li>
              </ul>
              <p class="slide-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <h2 class="slide-head">Lorem ipsum</h2>
            </div>
          </div>
        </div>
        <div class="slider__item">
          <div class="slidebox">
            <div class="slide-content">
              <ul class="Rating-satr">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-half-o"></i></li>
              </ul>
              <p class="slide-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <h2 class="slide-head">Lorem ipsum</h2>
            </div>
          </div>
        </div>
        <div class="slider__item">
          <div class="slidebox">
            <ul class="Rating-satr">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star-half-o"></i></li>
            </ul>
            <p class="slide-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <h2 class="slide-head">Lorem ipsum</h2>
          </div> -->
{{--        </div>
      </div>
    </div>
  </section>--}}

@endsection
@push('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $("#video1").bind("click", function() {
        jwplayer().play();
      });
    });
  </script>
  <style>
    .jw-logo-button{ display: none !important; }
  </style>
  <script>
@endpush