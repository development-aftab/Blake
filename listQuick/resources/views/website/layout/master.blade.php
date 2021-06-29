<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet" />
  <!--  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,600;0,700;1,300&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/75b143974a.js" crossorigin="anonymous"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="{{asset('website/css/style.css')}}" />
  <link rel="icon" href="{{ asset('website/image/logo_only.png')}}" style="width: 250px;"/>

  <title>ListQuick</title>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&callback=initAutocomplete&libraries=places&v=weekly" defer></script>  -->
    <!-- <script src="{{asset('website/autocomplete/index.js')}}"></script>    -->
    @yield('css')
</head> 
  <style>
      #autoCompletForm, #tafStateForm, #tafSaleForm { position: relative; }
      .tafDrop1 { top: 60px !important; left: 0 !important; background: #fff; z-index: 99; }
      .tafDrop2 { top: 55px !important; left: 167px !important; background: #fff; z-index: 99; }
      .tafDrop3 { top: 55px !important; left: 274px !important; background: #fff; z-index: 99; }

    .office-card-img {
    width: auto;
    height: 400px;
    margin: auto;
    text-align: center;
    display: block;
}
.terms-condition ul>li {
    list-style: none;
        display: inline;
}
.terms-condition ul {
    text-align: right;
}
    .terms-condition ul>li:first-child:after {
    content: '|';
    margin: 0 6px;
    color: #80aed6;
}
.active {
  text-decoration: underline;
}
    .background {
        background-image: url(../image/bg-image.png);
        background-size: cover;
        background-position: center;
        height: auto !important;
    }
    .background a img {
        padding: 50px 80px;
    }

    .taf_pac1 { width: 396px; background: #fff; margin-top: 4px; border-radius: 0 0 4px 4px; }

    @media screen and (-webkit-min-device-pixel-ratio:0)
    {
        .safari { background-color:#red }
    }
    @media (max-width: 1600px) {
        section.perfect-real-state { padding-bottom: 70px; text-align: center; }
        .perfect-real-state .title {margin: 20px 0;  }
        input.find-search-header { height: 39px; }
    }

    @media (max-width: 1480px) {
        section.perfect-real-state { padding-bottom: 70px; }
        .menu-heading p { width: 40%; }
    }

    @media only screen and (max-width: 768px){
        h3.sell-to-network-heading {margin: 20px auto 15px;  }
        body img.latop-img { position: relative !important; left: 0 !important; right: 0 ; width: 100% !important; top: 0!important;padding-right: 30%; margin-top: 40px;}
        .col-md-4.laptop-paragraph { margin-top: 0; text-align: center; }
        .sell-to-network .laptop-paragraph { max-width: 100%; }
        p.sell-to-network-para {font-size: 14px;}
        .view.my-img {max-width: 100% !important; height: 100% !important;}
        .view.my-img img{width: 100% !important; height: 100% !important; padding-bottom: 20px;}
        .menu-heading p {width: 80%;  }
        .terms-condition ul { text-align: center; padding: 0; }
        .bg-image{height: auto;}
        /*.pac-container.pac-logo { position: absolute !important; top: 434px !important; }*/
        .background a img {padding: 50px 33px;  }
    }
    @media (max-width: 480px) {
        ul.list-unstyled.list-red-box {  display: block;  text-align: center;  }
    }
    @media (max-width: 375px) {
        ul.list-unstyled.list-red-box {  display: block;  text-align: center;  }
    }

    @media (max-width: 320px) {
        ul.list-unstyled.list-red-box {  display: block;  text-align: center;  }
        .background { text-align: center; }
        body.background a img {padding: 50px 33px;  }
    }
  </style>

<body>
  <section id="main-header" class="header bg-image">

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
      <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('website/image/logo.png')}}" class="logo" style="width: 250px !important;" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="main-ul" class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link top-menu border-number" href="tel:{{$header_contact->phone??"(800) 588-9612"}}"><i class="fas fa-phone-alt"></i> {{$header_contact->phone??"(800) 588-9612"}} <span class="sr-only">(current)</span></a>
          </li>
{{--          <li class="nav-item @if(Route::is('aboutus')) {{ 'active' }} @endif">
            <a class="nav-link" href="{{route('aboutus')}}">About</a>
          </li>--}}
          @if(!Auth::user())
            <li class="nav-item @if(Route::is('signin')) {{ 'active' }} @endif">
              {{-- <a class="nav-link" href="/login">Sign in</a> --}}
              <a class="nav-link" href="{{ route('signin') }}">Sign In</a>
            </li>
           {{--  <li class="nav-item">
              <a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
            </li> --}}
          @else
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          @endif
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row tabs">
        <div class="col-md-12">
          <div class="menu-list">
            <ul class="list-unstyled">
              <li class="list-inline-item @if(Route::is('sale')) {{ 'active' }} @endif"><a href="{{ route('sale') }}" class="text-white">Selling</a></li>
              <li class="list-inline-item @if(Route::is('buy')) {{ 'active' }} @endif"><a href="{{ route('buy') }}" class="text-white">Buying</a></li>
              <li class="list-inline-item @if(Route::is('homes_estimate')) {{ 'active' }} @endif"><a href="{{ route('homes_estimate') }}" class="text-white">Home Estimates</a></li>
              <li class="list-inline-item @if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{ route('agent') }}" class="text-white">Agents</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row tab">
        <div class="col-md-12 menu-heading">
          <h2 class="text-white header-h2">{{$thinking_of_selling->heading??"Not Available"}}</h2>
          <!-- <h2 class="text-white header-h2">We can help.</h2> -->
          <p class="text-white homelight-para">{!!  $thinking_of_selling->description??"Not Available"!!}</p>
            <form method="post" action="{{route('sale')}}" id="autoCompletForm">
              @csrf
              <input type="text" required name="autocomplete" id="autocomplete" class="find-search-header" placeholder="Enter Your Address">
              <input type="hidden" name="latitude" id="latitude" class="form-control">
              <input type="hidden" name="longitude" id="longitude" class="form-control">
              <!-- <input type="text" placeholder="Enter your Address" name="search" id="Address" class="find-search-header autocomplete" onFocus="geolocate()" /> -->
              <button type="submit" class="find-btn-header" >Find an Agent</button>
              <!-- <button type="button" class="find-btn-header" id="Find_pbutton" href="#">Find an Agent</button> -->
            </form>
            {{--<div class="taf_pac1"></div>--}}
            <!--
       <form action="/action_page.php" class="form-1">
         <input type="text" placeholder="Search.." name="search" class="find-search">
         <button type="submit" class="find-btn">Find an Agent</button>
     </form>

 -->
        </div>
      </div>
    </div>
  </section>

{{--  <section class="learn-more">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-unstyled list-red-box">
              <li><a>&nbsp;</a></li>--}}
{{--            <li class="@if(Route::is('/')) {{ 'active' }} @endif"><a href="{{route('/')}}" class="mini-menu">Home</a></li>
            <!-- <li><a href="" class="mini-menu">Story</a></li> -->
            <li class="@if(Route::is('tooltipdetail')) {{ 'active' }} @endif"><a href="{{route('tooltipdetail')}}" class="mini-menu">Resources</a></li>
            <li class="@if(Route::is('professionals')) {{ 'active' }} @endif"><a href="{{route('professionals')}}" class="mini-menu">Certified</a></li>
            
                
            <!-- <li><a href="" class="mini-menu">Leadership</a></li> -->
            <li class="@if(Route::is('testimonials')) {{ 'active' }} @endif"><a href="{{route('testimonials')}}" class="mini-menu">Testimonials</a></li>
            <!-- <li><a href="" class="mini-menu">Careers</a></li> -->
            <li class="@if(Route::is('contact_us')) {{ 'active' }} @endif"><a href="{{route('contact_us')}}" class="mini-menu">Contact Us</a></li>
--}}
{{--          </ul>
        </div>
      </div>
    </div>
  </section>--}}
  @if(\Request::route()->getName() != '/')
    <div id="div1"></div>
  @endif
      @yield('content')
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <!--1-->
            <div class="col-md-5">
              <h6 class="footer-heading">Find top real estate agents in all major US cities</h6>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-unstyled link-footer">
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Atlanta">Atlanta</a></li>
                     <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Austin">Austin</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Boston">Boston</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Dallas">Dallas </a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Denver">Denver</a></li>
                  </ul>
                </div>

                <div class="col-md-6">
                  <ul class="list-unstyled link-footer">
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Los Angeles">Los Angeles</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Miami">Miami</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/new york">New York</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/Portland">Portland</a></li>
                    <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}/SanDiego">San Diego</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <!--2-->
            <div class="col-md-3">
              <h6 class="footer-heading">We're Here For You</h6>

              <div class="row">
                <div class="col-md-12">
                  <ul class="list-unstyled link-footer">
                    <li class="@if(Route::is('sale')) {{ 'active' }} @endif"><a href="{{route('sale')}}">Selling</a></li>
                     <li class="@if(Route::is('buy')) {{ 'active' }} @endif"><a href="{{route('buy')}}">Buying</a></li>
                      <li class="@if(Route::is('homes_estimate')) {{ 'active' }} @endif"><a href="{{route('homes_estimate')}}">Home Estimates</a></li>
                      <li class="@if(Route::is('agent')) {{ 'active' }} @endif"><a href="{{route('agent')}}">Agents</a></li>
                 <!--    <li><a href="">For Professionals</a></li>
                    <li><a href="">Sign In / Sign Up</a></li>
                    <li><a href="">Agent Help Center</a></li> -->
                  </ul>
                </div>
              </div>
            </div>

            <!--3-->

            <div class="col-md-2">
              <h6 class="footer-heading">ListQuick</h6>

              <div class="row">
                <div class="col-md-12">
                  <ul class="list-unstyled link-footer">
                    <li class="@if(Route::is('/')) {{ 'active' }} @endif"><a href="{{route('/')}}">Home</a></li>
                    <li class="@if(Route::is('aboutus')) {{ 'active' }} @endif"><a href="{{route('aboutus')}}">About</a></li>
                    <li class="@if(Route::is('signin')) {{ 'active' }} @endif"><a href="{{route('signin')}}">Sign In</a></li>
                    <li class="@if(Route::is('signup')) {{ 'active' }} @endif"><a href="{{route('signup')}}">Apply</a></li>
{{--                    <li class="@if(Route::is('tooltipdetail')) {{ 'active' }} @endif"><a href="{{route('tooltipdetail')}}">Resources</a></li>
                    <li class="@if(Route::is('professionals')) {{ 'active' }} @endif"><a href="{{route('professionals')}}">Certified</a></li>
                    <li class="@if(Route::is('testimonials')) {{ 'active' }} @endif"><a href="{{route('testimonials')}}">Testimonials</a></li>--}}
                    <li class="@if(Route::is('contact_us')) {{ 'active' }} @endif"><a href="{{route('contact_us')}}">Contact Us</a></li>
{{--                    <li class="@if(Route::is('press')) {{ 'active' }} @endif"><a href="{{route('press')}}">Press</a></li>--}}
                     <!--  -->
                  <!--   <li><a href="{{route('aboutus')}}">Resources</a></li>
                    <li><a href="{{route('aboutus')}}">Premier</a></li> -->

                    <!-- <li><a href="{{route('buy')}}">Contact Us</a></li> -->
                    <!-- <li><a href="{{route('agent')}}">Agents</a></li> -->

                   {{--  <li><a href="{{route('cash_cloe')}}">Cash Cloe</a></li>
                    <li><a href="{{route('homes_estimate')}}">Home Estimate</a></li> --}}
                    
                    
                     
                  </ul>
                </div>
              </div>
              
            </div>


            <!--4-->

            <div class="col-md-2">
              <h6 class="footer-heading">Follow Us</h6>

              <div class="row">
                <div class="col-md-2">
                  <ul class="list-unstyled link-footer">
                    <li><a href="https://www.facebook.com/list.quick.1/"> Facebook</a></li>
                    <li><a href="https://twitter.com/listquicknet">Twitter</a></li>
                    <li><a href="https://www.instagram.com/listquick/">Instagram</a></li>
                    <li><a href="https://www.youtube.com/channel/UCoGYb9Ry9f7nGw_FgRF53eg">YouTube</a></li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-12 col-12">
                  <div class="terms-condition">
                    <ul>
                      <li><a href="{{ route('terms_and_conditions') }}">Terms of Services</a></li>
                    <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                    </ul>
                  </div>
                </div>
              </div>
        </div>

        <hr />

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              {{--<p class="text-center copyright">&copy;ListQuick,Inc. 3705 W Pico Blvd Suite #2714 Los Angeles, CA 90019 - All Rights Reserved 2021.</p>--}}
              <p class="text-center copyright">{!!  $office_address_page_content->description??"&copy;ListQuick,Inc. 5101 Santa Monica Blvd Ste 8 PMB 391
                  Los Angeles ,CA 90029 - All Rights Reserved 2021."!!}</p>
            </div>
          </div>
        </div>
      </footer>
  {{--<div class="card-body"></div>--}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

  <script src="{{asset('website/js/swiper.min.js')}}"></script>
  <script src="{{asset('website/js/custom.js')}}"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&libraries=places"></script>

  <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU=places&callback=initAutocomplete" type="text/javascript"></script> -->
  <script type="text/javascript">
 $('html, body').animate({
     scrollTop: $("#div1").offset().top
 }, 150);
</script>
  <script>
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
  </script>
  <script>
     google.maps.event.addDomListener(window, 'load', initialize);

     function initialize() {
         var input = document.getElementById('autocomplete');
         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#latitude').val(place.geometry['location'].lat());
             $('#longitude').val(place.geometry['location'].lng());
             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");
         });
     }
      google.maps.event.addDomListener(window, 'load', initializestate);

     function initializestate() {
         var input = document.getElementById('state');
         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
         });
     }

  </script>


  <script>
    $(document).ready(function () {
      // Add minus icon for collapse element which is open by default
      $(".collapse.show").each(function () {
        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
      });

      // Toggle plus minus icon on show hide of collapse element
      $(".collapse")
        .on("show.bs.collapse", function () {
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        })
        .on("hide.bs.collapse", function () {
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });

    $(".slider").slick({
      centerMode: true,
      slidesToShow: 3,
      centerPadding: "4px",
      speed: 1300,
      infinite: true,
      touchThreshold: 1000,
      autoplay: false,
      autoplaySpeed: 2000,
      prevArrow: "<a href='#' id='left-arrow'><</a>",
      nextArrow: "<a href='#'  id='right-arrow'>></a>",
      responsive: [
        //   {
        //     breakpoint: 1500,
        //     settings: {
        //       slidesToShow: 3,
        //     },
        //   },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
          },
        },

        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },

        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            //   slidesToScroll: 2
          },
        },
      ],
    });
/*  $(document).on('click','.find-btn-header',function(e){
    address  = $('#autocomplete').val();
    lat      = $('#latitude').val();
    lng      = $('#longitude').val();
    window.location = "{{ route('buy') }}/"+address+'/'+lat+'/'+lng;
  });*/
  $("#autocomplete").keyup(function(event) {
        if (event.keyCode === 13) {
        $("#Find_button").click();
        }
  });
    $('#autocomplete').on('keyup',function(){
        $('.pac-logo').addClass('tafDrop1');
        $('.pac-logo+.pac-logo').addClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').addClass('tafDrop3');

        $('.pac-logo+.pac-logo').removeClass('tafDrop1');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop1');

        $('.pac-logo').removeClass('pac-logo');
        $('.pac-container').removeClass('pac-container');

        var _autoComplete = $('#autocomplete');
        var pacContainer = $('.tafDrop1');
        $(_autoComplete.parent()).append(pacContainer);
    });

    $('#state').on('keyup',function(){
        $('.pac-logo').addClass('tafDrop1');
        $('.pac-logo+.pac-logo').addClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').addClass('tafDrop3');

        $('.pac-logo+.pac-logo').removeClass('tafDrop1');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop1');

        $('.pac-logo').removeClass('pac-logo');
        $('.pac-container').removeClass('pac-container');

        var _autoComplete = $('#state');
        var pacContainer = $('.tafDrop2');
        $(_autoComplete.parent()).append(pacContainer);
    });

    $('#auto_selling').on('keyup',function(){
        $('.pac-logo').addClass('tafDrop1');
        $('.pac-logo+.pac-logo').addClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').addClass('tafDrop3');

        $('.pac-logo+.pac-logo').removeClass('tafDrop1');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop2');
        $('.pac-logo+.pac-logo+.pac-logo').removeClass('tafDrop1');

        $('.pac-logo').removeClass('pac-logo');
        $('.pac-container').removeClass('pac-container');

        var _autoComplete = $('#auto_selling');
        var pacContainer = $('.tafDrop3');
        $(_autoComplete.parent()).append(pacContainer);
    });
</script>
@yield('js')
@stack('js')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        //this function is used for alerting in complete project.
        function showSwal(title,text,icon){
            swal({
                title:  title,
                text:   text,
                icon:   icon,
                timer:  10000,
                showCancelButton: false,
            })
        }
        //this function is used for alerting in complete project & load pages.
        function showSwalLoadPage(title,text,icon,url){
            swal({
                title:  title,
                text:   text,
                icon:   icon,
                timer:  10000,
                showCancelButton: false,
            }).then(() => {
                window.location.href = url;
            })
        }        
    </script>
       @if(session()->has('type')=='success')
            <script>
                swal({
                    icon: '{{session()->get('type')}}',
                    title: '{{session()->get('msg')}}',
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @elseif(session()->has('type')=='error')
            <script>
                swal({
                    icon: '{{session()->get('type')}}',
                    title: '{{session()->get('msg')}}',
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @endif                  
</body>
</html>