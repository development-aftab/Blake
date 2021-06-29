@extends('website.layout.master')
@section('content')


    <!-- ammar Start -->
    <section id="services">
      <div class="container">
        @foreach($elites as $key=>$elite)
          @if($key % 2==0)
            <div class="row services-row offices-row">
            
            <div class="col-lg-6 col-md-6 col-sm-12 services-col-1">
              <h3>{!!$elite->heading??""!!}</h3>
              <p>{!!$elite->description??""!!}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-right services-col-2">
              <img src="{{asset('website')}}/{{$elite->image??''}}" alt="" />
            </div>
          </div>
          @else

            <div class="row services-row-2 offices-row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <img class="img-3-col img-fluid" src="{{asset('website')}}/{{$elite->image??''}}" alt="" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">

                <h3>{!!$elite->heading??""!!}</h3>                
                <p>{!!$elite->description??""!!}</p>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </section>

    <section id="call-to-action">
      <div class="container-fluid">
        <h3>If you’re as committed to simplicity, certainty, and satisfaction as we are,</h3>
        <h3>we want to hear from you.</h3>
        <a href="{{route('contact_us')}}" class="btn apply-header-btn-2">Apply </a>
        <!-- <button type="button" class="btn btn-danger">Apply</button> -->
      </div>
    </section>

    <section class="client-faq">
      <div class="container">
        <div class="row">
          <!-- accordian-1 -->
          <div class="col-md-12">
            <h4 class="faq-heading">Frequently Asked Question</h4>

            <hr />
            <div class="row">
              @foreach($faqs as $item)
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo" class="collapse-anchor">{{$item->title??"Not Available"}}<i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo" class="collapse">{{$item->description??"Not Available"}}</div>
              </div>
              @endforeach
            </div>           
          </div>
          <!-- accordian-1-end -->
        </div>
      </div>
    </section>
    @endsection

    @push('js')
      <script src="{{asset('website')}}/https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{asset('website')}}/https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="{{asset('website')}}/https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{asset('website')}}/https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="{{asset('website')}}/js/swiper.min.js"></script>
    <script src="{{asset('website')}}/js/custom.js"></script>

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
    @endpush