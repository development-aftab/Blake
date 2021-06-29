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
.left-sub-row p {
  margin-bottom: 0;
}
  
</style>
    <section class="header bg-color">
        
        
      </section>
    
  
      <section id="walkthrough">
        <div class="container">
          <div class="row benefits-row">
            <div class="col-lg-4 col-md-6">
              <span><i class="fas fa-address-card"></i></span>
              <h4>{!!$upfront_costs->heading??""!!}</h4>
              <p>{!!$upfront_costs->description??""!!}</p>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <span><i class="fas fa-user-check"></i></span>
              <h4>{!!$transaction_ready_clients->heading??""!!}</h4>
              <p>{!!$transaction_ready_clients->description??""!!}</p>
            </div>
  
            <div class="col-lg-4 col-md-12">
              <span><i class="fas fa-chart-line"></i></span>
              <h4>{!!$close_more_deals->heading??""!!}</h4>
              <p>{!!$close_more_deals->description??""!!}</p>
            </div>
          </div>
        </div>
  
        <div class="container-fluid">
          <h3 class="text-center">{!!$certified->description!!}</h3>
          <div class="row step-main-row">
            <div class="col-lg-4 step-left-col">
              <div class="left-card-long shadow">
                <div class="row align-items-center left-sub-row">
                  <div class="col-lg-2 number-col">
                    <img class="number-img" src="{{asset('website/image/num1.png')}}" alt="" />
                  </div>
                  <div class="col-lg-10">
                    <h4>Apply</h4>
                  </div>
                  <div class="col-lg-10 offset-lg-2">
                    <p class="step-p">{!!$create_profile->description??""!!}</p>
  
                    <!-- <button type="button" class="btn btn-danger step-btn">Sign up now</button> -->
                    <a  href="{{route('signup')}}" class="btn btn-danger step-btn"> Apply now</a>
                  </div>
                </div>
  
                <div class="row align-items-center left-sub-row">
                  <div class="col-lg-2 number-col">
                    <img class="number-img" src="{{asset('website/image/num2.png')}}" alt="" />
                  </div>
                  <div class="col-lg-10">
                    <h4>{!!$refferal_agreement->heading??""!!}</h4>
                  </div>
                  <div class="col-lg-10 offset-lg-2">
                    <p class="step-p">{!!$refferal_agreement->description??""!!}</p>
                  </div>
                </div>
  
                <div class="row align-items-center left-3rd-sub-row">
                  <div class="col-lg-2 number-col">
                    <img class="number-img" src="{{asset('website/image/num3.png')}}" alt="" />
                  </div>
                  <div class="col-lg-10">
                    <h4>{!!$update_transaction->heading??""!!}</h4>
                  </div>
                  <div class="col-lg-10 offset-lg-2">
                    <p class="step-p">{!!$update_transaction->description??""!!}</p>
                  </div>
                </div>
  
                <div class="row align-items-center last-left-sub-row">
                  <div class="col-lg-10 offset-lg-2">
                    <h4>{!!$how_can_we_help->heading??""!!}</h4>
                  </div>
                  <div class="col-lg-10 offset-lg-2">
                    <p class="step-p">{!!$how_can_we_help->description??""!!}</p>
                    <a href="#">contact@listquick.net</a>
                    {{-- <a href="#">Visit The Agent Help Center <i class="fas fa-angle-double-right"></i></a> --}}
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-8 step-right-main-row">
              <div class="step-img-container text-right">
                <img class="step-img" src="{{asset('website').'/'.$professionalPageImage->image}}" alt="" />
              </div>
  
            </div>
          </div>
        </div>
      </section>
  @if($achievement->status == 1)
      <section id="video-section">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <a href="#myModal" data-toggle="modal"> <img class="img-fluid big-men-video" src="{{asset('website')}}/image/video-thumnail.png" alt="" /> </a>
  
              <div id="myModal" class="modal fade video-size">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- <div class="modal-header">
                         
                      </div> -->
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
  
                      <div class="embed-responsive embed-responsive-16by9">
                        {{--<iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="{{asset('website')}}/{{$achievement->image??''}}" allowfullscreen></iframe>--}}
                        <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/watch?v=EngW7tLk6R8" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6">
              <p>{!!$achievement->description??""!!}</p>
  
              <p class="caption">{!!$achievement->heading??""!!}</p>
              <a href="#">Read Carlton's story <i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>
      </section>
  @endif
      <section id="word-togather">
        <div class="container">
          <h3 class="text-center">{!!$certified_Build->description!!}</h3>
          <div class="row">
            <div class="col-lg-6">
              <h4>{!!$customize_profile->heading??""!!}</h4>
              <p>{!!$customize_profile->description??""!!}</p>
  
              <h4>{!!$connect_with_clients->heading??""!!}</h4>
              <p>{!!$connect_with_clients->description??""!!}</p>
  
              <h4>{!!$access_to_tools->heading??""!!}</h4>
              <p>{!!$access_to_tools->description??""!!}</p>
            </div>
  
            <div class="col-lg-6">
              <img class="img-fluid map-img" src="{{asset('website')}}/{{$total_agents->image??''}}" alt="" />
              <p>{!!$total_agents ->description??""!!}</p>
            </div>
          </div>
        </div>
      </section>
  
      <section id="referral-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-center text-white">Ready for more referrals?</h2>
              <p class="text-center text-white">See how you can succeed as a top real estate agent with ListQuick</p>
  
              <div class="read-more">
                <a href="{{route('signup')}}" class="btn btn-read-more">Apply</a>
               </div>
            </div>
          </div>
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
                <div class="col-md-12" style="margin-bottom: 10px">
                  <a data-toggle="collapse" data-target="#demo{{$item->id}}" class="collapse-anchor">{{$item->title??"Not Available"}}<i class="fa fa-angle-right pull-right"></i></a>
                  <div id="demo{{$item->id}}" class="collapse">{!! $item->description??"Not Available"!!}</div>
                </div>
                @endforeach
              </div>
            </div>
            <!-- accordian-1-end -->
          </div>
        </div>
      </section>
      <!-- ammar end -->
      <!-- ========================== -->
      <!--Ammar End-->
      <!-- ========================== -->
@endsection  
@push('js')      
      <script>
        $(document).ready(function () {
          /* Get iframe src attribute value i.e. YouTube video url
          and store it in a variable */
          var url = $("#cartoonVideo").attr("src");
  
          /* Assign empty url value to the iframe src attribute when
          modal hide, which stop the video playing */
          $("#myModal").on("hide.bs.modal", function () {
            $("#cartoonVideo").attr("src", "");
          });
  
          /* Assign the initially stored url back to the iframe src
          attribute when modal is displayed again */
          $("#myModal").on("show.bs.modal", function () {
            $("#cartoonVideo").attr("src", url);
          });
        });
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
      </script>
@endpush      
