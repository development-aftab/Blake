@extends('website.layout.master')
@section('content')


    <!-- ammar Start -->
    <section id="services">
      <div class="container">
        <div class="row services-row offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12 services-col-1">
            <h3>Your Talent. Our Tech.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-right services-col-2">
            <img src="{{asset('website')}}/image/mobile-screen.png" alt="" />
          </div>
        </div>

        <div class="row services-row-2 offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <img class="img-3-col img-fluid" src="{{asset('website')}}/image/1809.png" alt="" />
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>Only The Best Agents.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
          </div>
        </div>

        <div class="row services-row-3 offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="services-col-5">
              <h3>Only The Best Agents</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-right services-col-6">
            <img src="{{asset('website')}}/image/mobile-screen-2.png" alt="" />
          </div>
        </div>

        <div class="row services-row-4 offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="services-col-7">
              <img src="{{asset('website')}}/image/men-demo.png" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>Be Part Of Something</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          </div>
        </div>

        <div class="row services-row-5 offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <h3>Dedicated ListQuick Support</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-right">
            <div class="services-col-10 text-right">
              <img class="img-fluid" src="{{asset('website')}}/image/person2.png" alt="" />
            </div>
          </div>
        </div>

        <div class="row services-row-6 offices-row">
          <div class="col-lg-6 col-md-6 col-sm-12 img-6-col">
            <div class="services-col-11">
              <img src="{{asset('website')}}/image/mobile-screen3.png" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="services-col-12">
              <h3>Dedicated ListQuick Support</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="call-to-action">
      <div class="container-fluid">
        <h3>If you’re as committed to simplicity, certainty, and satisfaction as we are,</h3>
        <h3>we want to hear from you.</h3>
        <a href="#" class="btn apply-header-btn-2">Apply </a>
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
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo" class="collapse-anchor">What Is Homelight For Real Estate Agents?<i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo1" class="collapse-anchor">How Does Homelight Work? <i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo1" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo2" class="collapse-anchor">What Does It Cost?<i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo2" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo3" class="collapse-anchor">Can I Pay To Boost My Homelight Ranking?<i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo3" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo4" class="collapse-anchor">How Can I Boost My Homelight Rankings? <i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo4" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo5" class="collapse-anchor">How Can I Get More Reviews? <i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo5" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
            </div>

            <hr />
            <div class="row">
              <div class="col-md-12">
                <a data-toggle="collapse" data-target="#demo6" class="collapse-anchor">How Many Lead should I Expect? <i class="fa fa-angle-right pull-right"></i></a>
                <div id="demo6" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              </div>
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