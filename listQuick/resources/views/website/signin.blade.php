<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <!--  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,600;0,700;800;1,300&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/75b143974a.js" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('website')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('website')}}/css/other-style.css" />
    <link rel="stylesheet" href="{{asset('website')}}/css/form.css" />
    <title>Sign In</title>
    <style type="text/css">
      .error{
        color: red !important;
        float: left !important;
      }
      .bg-image {
          height: 100vh !important;
      }

    </style>
  </head>

  <body>
    <section class="header bg-image new-bg-2 sign-background">
      <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('website')}}/image/logo.png" class="logo" style="width: 250px;" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul id="main-ul" class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link top-menu border-number" href="tel:(800) 588-9612"><i class="fas fa-phone-alt"></i> (800) 588-9612 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('aboutus')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('signup')}}">Apply</a>
            </li>
          </ul>
        </div>

      </nav>

      <!-- content-start -->
      <div class="container-fluid mt-4" id="sign-in-form">
        <div class="row">
          <div class="col-md-6 mx-auto content">
            <form id="agent_login_form" action="{{ route('signin_process') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="text-center">
                <h3 class="text-white">Sign In</h3>
                {{-- <h6 class="text-white fill-form-para">Please fill in this form to create an account</h6> --}}
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                    <input type="email" class="form-control email-field signup-field" placeholder="Enter Email*" name="email" id="email" />                
                  </div>
                  <div class="col-sm-2"></div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                    <input type="password" class="form-control password-field signup-field" aria-describedby="emailHelp" placeholder="Password*" name="password" id="password" />
                  </div>
                  <div class="col-sm-2"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <div class="forget-password">
                    <div class="checkbox">
                      <label class="text-white"><input type="checkbox" value="" /> Rememeber Me </label>
                    </div>
                    <div>
                      <a class="text-white forget-pass" href="{{ url('/password/reset') }}">Forgot Password</a>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-signIn btn-signup d-block mx-auto text-white">SIGN IN</button>
                  <br>
                <a style="background: white ; width: 347px;" class="btn d-block mx-auto already-account" href="{{route('signup')}}">Not a ListQuick Certified Agent? Apply!</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- content-end -->
    </section>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="{{asset('website')}}/js/swiper.min.js"></script>
    <script src="{{asset('website')}}/js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&callback=initAutocomplete&libraries=places&v=weekly" defer></script>
    <script src="{{asset('website/autocomplete/index.js')}}"></script>
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
    </script>
    <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    {{--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#agent_login_form').validate({ // initialize the plugin
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 5,
                    },
                },
                submitHandler: function(form,e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "{{route('signin_process')}}",
                        // dataType: "json",
                        data: $('form').serialize(),
                        success: function(result) {
                            if(result.msg=='success'){
                                window.location.href = "/dashboard";
                            }else if(result.msg=='inactive'){
                                showSwal('OOPS','Your account is inactive contact admin for approval.','info');
                            }else{
                                showSwal('OOPS','Invalid Email or Password, Try again.','error');
                            }
                        },
                        error : function(error) {
                            showSwal('OOPS','Invalid Email Address or Password, Try again.','error');
                        }
                    });
                    return false;
                }
            });
        });
    </script>
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
                    icon: "{{session()->get('type')}}",
                    title: "{{session()->get('msg')}}",
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @elseif(session()->has('type')=='error')
            <script>
                swal({
                    icon: "{{session()->get('type')}}",
                    title: "{{session()->get('msg')}}",
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @endif
  </body>
</html>