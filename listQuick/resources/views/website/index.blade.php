@extends('website.layout.master')
@section('content')
<style type="text/css">
  .read-more {
    text-align: center;
}
.read-more .btn-read-more {
    border-radius: 50px;
}
.read-more .btn-read-more:hover {
    color: white;
}

form.find-agent-form {
    text-align: center;
}

img.latop-img {
    position: absolute;
    width: 100%;
    left: -357px;
    top: 33px;
}

.iframe-center {
    text-align: center;
    margin-bottom: 0;
}
/*.pac-container.pac-logo {
    position: relative !important;
    top: -725px !important;
}
*/
  img.latop-img {
      position: absolute !important;
      width: 100% !important;
      left: -150px !important;
      top: 103px !important;
  }
  .read-more {
      margin-top: 30px;
  }
</style>
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
{{-- <a href="{{asset('website/live_backup3-11-2021.zip')}}" download>hello</a> --}}
    <section class="perfect-real-state">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center perfect-real-state-h3">{{$hire_agent->heading??"Not Available"}}</h3>
                    <!-- <h3 class="text-center perfect-real-state-h3">Agent In Your Area</h3> -->

                    <div class="row real-state-para">
                        <div class="col-md-12">
                            <p class="text-center perfect-real-state-p">{!! $hire_agent->description??"Not Available" !!}
                                {{-- <a href="">Learn more</a></p> --}}
                        </div>
                    </div>

                   {{--  <form class="find-agent-form" method="post" action="{{route('sale')}}">
                      @csrf
                      <input type="text" required name="autocomplete" id="auto" class="find-search-header" placeholder="Select Location">
                      <input type="hidden" name="latitude" id="latitudeauto" class="form-control">
                      <input type="hidden" name="longitude" id="longitudeauto" class="form-control">
                      <!-- <input type="text" placeholder="Enter your Address" name="search" id="Address" class="find-search-header autocomplete" onFocus="geolocate()" /> -->
                      <button type="submit" class="find-btn-header" >Find an Agent</button>
                      <!-- <button type="button" class="find-btn-header" id="Find_button" href="#">Find an Agent</button> -->
                    </form>
                    <br> --}}
                      <form class="find-agent-form" id="tafStateForm">
                      
                      <input type="text" required name="state" id="state" class="find-search-header" placeholder="Enter Your Location">
                      
                      <!-- <input type="text" placeholder="Enter your Address" name="search" id="Address" class="find-search-header autocomplete" onFocus="geolocate()" /> -->
                      <button type="button" class="find-btn-header Find_an_Agent" >Find an Agent</button>
                      <!-- <button type="button" class="find-btn-header" id="Find_button" href="#">Find an Agent</button> -->
                    </form>
                    <br>

                    <!--   <div class="bg-dark black-box">
          <div class="row-1 black-box-1">
            <div><img src="{{asset('website/image/card-image.png')}}" class="small-img" /></div>
            <div class="black-box-heading">
              <h4 class="text-white lorem-heading">lorem ipsum</h4>
              <p class="text-white lorem-para">Boston,MA</p>
              <img src="{{asset('website/image/star.png')}}" class="star" />
            </div>
          </div>
          <div class="row black-box-2">
            <div class="div-1">
              <h3 class="text-white heading-1">12</h3>
              <p class="text-white para-1">Homes sold within a <br />mile of your home.</p>
            </div>
            <div class="div-2">
              <h3 class="text-white heading-1">29</h3>
              <p class="text-white para-1">
                Homes sold near <br />
                your price point.
              </p>
            </div>
            <div class="div-3">
              <h3 class="text-white heading-1">8</h3>
              <p class="text-white para-1">
                Percent of sales <br />
                over listing price.
              </p>
            </div>
          </div>
        </div>
 -->
                    <div class="iframe-center">
                        <!-- <iframe class="shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57893.156010951745!2d67.05638591140513!3d24.92108971034303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb338b808bfd6b1%3A0x997b1a02c2570822!2sGulshan-e-Iqbal%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1601567245740!5m2!1sen!2s" width="85%" height="430" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                        <div id="map" style="height: 430px; width: 100%;border: 0;" class="shadow" frameborder="0" > </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="sell-to-network">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 laptop-image-box">
                    <img src="{{asset('website')}}/{{$sell_our_network->image??''}}" class="latop-img" />
                </div>

                <div class="col-md-4 laptop-paragraph">
                    <h3 class="sell-to-network-heading">{{$sell_our_network->heading??"Not Available"}}</h3>
                    <p class="sell-to-network-para">{!! $sell_our_network->description??"Not Available" !!}</p>

                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <a href="{{ route('homes_estimate') }}" class="btn estimate-button">Get your estimates</a>
                            <!-- <a href=""> <button type="button" class="btn estimate-button">Get your estimates</button></a> -->
                        </div>

                        <div class="col-md-4 learn-more-padding">
                            {{--<a href="#" class="learn-more-btn"> Learn more</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="let-talk">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-2 col-md-4 let-talk-padding">
                    <div class="padding-div">
                        <h3 class="let-talk-heading">{{$lets_talk->heading??"Not Available"}}</h3>
                        <p class="let-talk-p">{!! $lets_talk->description??"Not Available" !!}</p>
                        <a class="let-talk-number" href="tel:{{$lets_talk->phone??"(800) 588-9612"}}">Call {{$lets_talk->phone??"(800) 588-9612"}}</a>
{{--                        <p class="let-talk-number" href="tel:{{$lets_talk->phone??"(800) 588-9612"}}" > Call {{$lets_talk->phone??"Not Available"}}</p>--}}
                    </div>
                </div>
                <div class="col-md-6 let-talk-img">

                    <img src="{{asset('website')}}/{{$lets_talk->image??''}}" class="sofa-image img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <section class="happy-client">
        <div class="container">
            <div class="row">
                <div class="col-md-12 happy-client-box">
{{--                    <div class="red-box">
                        <h3 class="happy-client-heading-a text-center">Happy Client</h3>
                        <h3 class="happy-client-heading-b text-center">{{$happyClients??""}}+</h3>
                    </div>--}}

                    {{--<h3 class="text-center happy-client-heading-2">Happy Clients And Counting</h3>
                    <p class="text-center happy-client-heading-para">My HomeLight experience was nothing less than stel...</p>

                    <div class="small-box">
                      <div>
                        <img src="{{asset('website/image/testimonial.png')}}" class="testimonial-img" />
                      </div>
                      <div class="line-gap">
                        <p class="name">Michael Z.</p>
                        <p class="country">Dunkirk,MD,USA</p>
                      </div>
                    </div>

                    <div class="text-center">
                      <a href="testimonials.html" class="btn text-center testimonial-btn shadow">VIEW ALL TESTIMONIALS </a>
                      <!-- <a href="testimonials.html"> <button type="button" class="btn text-center testimonial-btn shadow">VIEW ALL TESTIMONIALS</button></a> -->
                    </div>--}}
                </div>
            </div>
        </div>
    </section>
{{--added start on client requirements --}}
<section id="contact-us">
    <div class="container">
        <div class="row contact-row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h3>Contact us</h3>
                <p class="contact-us-paragraph">{!! $contactUsPageContent->description??"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." !!}</p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                {{--<form class="contact-us-form" action="{{ route('contact_us_process') }}" method="post">--}}
                <form class="contact-us-form" action="{{ route('contact_process') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp" placeholder="Full Name*" required />
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email"  />
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Phone" />
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message*"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger custom-btn-form">Contact us</button>
                </form>
            </div>
        </div>
    </div>
</section>
{{--added end on client requirements --}}
{{--commented start said by client dont delete.--}}
{{--    <section class="tips-tools">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center tips-tools-heading">{{$Tips_And_Tools->heading}}</h3>
                    <p class="tips-tools-para">{!!$Tips_And_Tools->description!!}</p>
                </div>
            </div>
             <div class="row">
            @foreach($tipAndTools as $tipAndTool)
           
            <div class="col-md-4">
              <div class="view my-img" style="position: relative; max-width: 300px; width: 100%; height: 250px">
                 <a href="{{route('tooltipdetail')}}/{{$tipAndTool->id}}">
                <img src="{{asset('website')}}/{{$tipAndTool->image??''}}" style="width: 285px" />
                <div class="my-txt text-white"><p class="hover-text">{!!$tipAndTool->title??""!!}</p></div>
                </a>
              </div>
            </div>
            
            @endforeach
          </div>
          <div class="read-more">
            <a href="{{route('tooltipdetail')}}" class="btn btn-read-more safari">Read More</a>
          </div>
            <div class="row">
                <div class="col-md-12 read-more-btn">
                    --}}{{-- <a href="{{ route('tooltipdetail') }}" class="btn btn-read-more shadow">Read more</a> --}}{{--
                    <!-- <a href="cash-cloe.html"><button type="button" class="btn btn-read-more shadow">Read more</button></a> -->
                </div>
            </div>
        </div>
    </section>--}}
{{--commented end said by client dont delete.--}}
    <section class="sell-smarter">
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white">Thinking of Selling? We're Here For You.</h2>

                   <form class="find-agent-form" method="post" action="{{route('sale')}}" id="tafSaleForm">
                      @csrf
                      <input type="text" required name="autocomplete" id="auto_selling" data-show="down" class="find-search-header" placeholder="Enter Your Address">
                      <input type="hidden" name="latitude" id="latitudeauto_selling" class="form-control">
                      <input type="hidden" name="longitude" id="longitudeauto_selling" class="form-control">
                      <button type="submit" class="find-btn-header" >Find an Agent</button>
                    </form>

                    <div class="taf_pac2"></div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white">Thinking of Selling? We're Here For You.</h2>
                   <form class="find-agent-form" method="post" action="{{route('mailchimp_subscribe')}}" id="tafSaleForm">
                      @csrf
                      <input type="text" required name="subscriber_name" id="subscriber_name" data-show="down" class="find-search-header" placeholder="Enter Full Name" required>
                      <input type="text" required name="subscriber_email" id="subscriber_email" data-show="down" class="find-search-header" placeholder="Enter Email Address" required>
                      <button type="submit" class="find-btn-header" >Subscribe</button>
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

{{--    <section id="testimonials" data-aos="fade-up">
        <div class="container-fluid">
            <div class="slider">--}}
              {{--@foreach($reviews as $review)
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
                    </div>
                </div> -->
{{--            </div>
        </div>
    </section>--}}

@endsection

@push('js')
<script>
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
     
       $(document).on('click','.Find_an_Agent',function(e){
       let city = $('#state').val();
          window.location.replace("{{route('agent')}}/"+city);
        }); 
       $(document).on('keyup','.find-search-header',function(e){
        console.log('hello')
       show =  $(this).attr('data-show');
       if(show == 'down'){

        $(".pac-container").css({ "position": "","top": "" });
        $(".pac-container").css({"position": "relative", "top": "58px"});
       }
        });
  </script>
 <script>
     google.maps.event.addDomListener(window, 'load', initializes);

     function initializes() {
         var input = document.getElementById('auto');
         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#latitudeauto').val(place.geometry['location'].lat());
             $('#longitudeauto').val(place.geometry['location'].lng());
             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");
         });
     }
  </script>
  <script>
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");


     });

  </script>
 <script>
     google.maps.event.addDomListener(window, 'load', initializes);

     function initializes() {
         var input = document.getElementById('auto_selling');
         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#latitudeauto_selling').val(place.geometry['location'].lat());
             $('#longitudeauto_selling').val(place.geometry['location'].lng());
             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");
         });
     }
  </script>
<script>
    var map;
    var InforObj = [];
    var centerCords = {
        lat: 40.730610,
        lng: -95.935242
    };
    var markersOnMap = [
            @foreach($agents as $key=>$agent)
        {
            placeName: "{{$agent->name??"Not Available"}}",
            address: "{{$agent->profile->address??"Not Available"}}",
            image: "{{$agent->profile->pic??"Not Available"}}",

            LatLng: [{
                lat: {{$agent->profile->lat??40.7128}},
                lng: {{$agent->profile->lng??-74.0060}}
            }]
        },
        @endforeach
    ];

    window.onload = function () {
        initMap();
    };

    function addMarkerInfo() {
        for (var i = 0; i < markersOnMap.length; i++) {
            // var contentString = '<div id="content"><h1>' + markersOnMap[i].placeName +
            // '</h1><p>Lorem ipsum dolor sit amet, vix mutat posse suscipit id, vel ea tantas omittam detraxit.</p></div>';

            var contentString = '<div id="content"><img src="{{asset('storage/uploads/users') }}/'+markersOnMap[i].image+'" style="width:50px;height:50px;border-radius:50%"> &nbsp; &nbsp;<h3>' + markersOnMap[i].placeName +
                    '<br></h3>'+ markersOnMap[i].address +'</p></div>';

            const marker = new google.maps.Marker({
                position: markersOnMap[i].LatLng[0],
                map: map
            });

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 200
            });

            marker.addListener('click', function () {
                closeOtherInfo();
                infowindow.open(marker.get('map'), marker);
                InforObj[0] = infowindow;
            });
            // marker.addListener('mouseover', function () {
            //     closeOtherInfo();
            //     infowindow.open(marker.get('map'), marker);
            //     InforObj[0] = infowindow;
            // });
            // marker.addListener('mouseout', function () {
            //     closeOtherInfo();
            //     infowindow.close();
            //     InforObj[0] = infowindow;
            // });
        }
    }

    function closeOtherInfo() {
        if (InforObj.length > 0) {
            /* detach the info-window from the marker ... undocumented in the API docs */
            InforObj[0].set("marker", null);
            /* and close it */
            InforObj[0].close();
            /* blank the array */
            InforObj.length = 0;
        }
    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: centerCords
        });
        addMarkerInfo();
    }
</script>
@endpush