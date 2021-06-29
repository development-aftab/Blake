@extends('website.layout.master')
@section('content')
    <!-- ammar -->
    <section id="section-banner">
      <div class="container press-row">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="press-banner-img">
              <img src="image/press-img1.png" alt="" />
            </div>
            <p>The company will use the new capital to further steer the company on its impressive growth path.</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="press-banner-img">
              <img src="image/press-img2.png" alt="" />
            </div>
            <p>In a world of inflated agent reviews and endless buyer leads, HomeLight is drumming up listing leads for agents by attracting homesellers seeking to list with professionals who are proven to outperform their peers.</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="press-banner-img">
              <img src="image/press-img3.png" alt="" />
            </div>
            <p>Citi has been an active corporate investor in FinTech and Security startups; HomeLight's data may help to optimize its residential mortgage lending business.</p>
          </div>
        </div>
      </div>
    </section>
    <section id="recent-news">
      <div class="container press-row">
        <div class="row">
          <div class="col-lg-9">
            <h2 class="recent-news-main-heading">Recent News</h2>
              @foreach($press as $item)
                <div class="row news-col-9">
                  <div class="col-lg-8">
                    <!--======1========-->
                    <h5>{!!$item->title??""!!}</h5>
                    <p>{!!$item->description??""!!}</p>
                    <a href="#">Read More</a>
                  </div>

                  <div class="col-lg-4">
                    <h5>{{$item->created_at->format('d-M-Y')??""}}</h5>
                  </div>
                </div>
              @endforeach
            <div class="row news-col-9">
              <!--======View More========-->
              <div class="col-lg-8 text-center">
                <a href="#">View More</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 media-col-12">
            <div class="row media-row">
              <div class="col-lg-12">
                <h5>Media kit</h5>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Media and press</h5>
                <p>General Inquiries</p>
                <a class="media-link" href="#">ab@listquick.com</a>
                <a class="media-link" href="#">123456789</a>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Media and press</h5>
                <p>General Inquiries</p>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Media and press</h5>
                <p>General Inquiries</p>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Media and press</h5>
                <p>General Inquiries</p>
                <a href="#"><img class="list-quick-img" src="image/list-quick1.png" alt="" /></a>
                <button type="button" class="btn btn-outline-primary btn-download">Download</button>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Logo Inverted</h5>
                <p>EPS, JPG and PNG</p>
                <a href="#"><img class="list-quick-img" src="image/list-quick2.png" alt="" /></a>
                <button type="button" class="btn btn-outline-primary btn-download">Download</button>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Founder Photo</h5>
                <p>High Resolution</p>
                <a href="#"><img class="img-fluid founder-img" src="image/48061.png" alt="" /></a>
                <button type="button" class="btn btn-outline-primary btn-download">Download</button>
                <hr class="media-kit-hr" />
              </div>

              <div class="col-lg-12">
                <h5>Follow ListQuick</h5>
                <div class="row social-row">
                  <div class="col-lg-12 icon-col">
                    <a href="#"><i class="fab fa-facebook-f"></i><span class="social-text">Facebook</span> </a>
                  </div>
                </div>

                <div class="row social-row">
                  <div class="col-lg-12 icon-col">
                    <a href="#"><i class="fab fa-twitter"></i><span class="social-text">Twitter</span> </a>
                  </div>
                </div>

                <div class="row social-row">
                  <div class="col-lg-12 icon-col">
                    <a href="#"><i class="fab fa-instagram"></i><span class="social-text">Instagram</span> </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
    <!-- ammar end -->

@push('js')
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
