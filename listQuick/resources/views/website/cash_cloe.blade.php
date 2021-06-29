@extends('layouts.frontLayout')

@section('content')
<section class="trade-in-work">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center trade-in-heading">How ListQuick Trade-in works</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="offer-section">
    <div class="container">
      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('assets/image/11.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('assets/image/offer-1.png')}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">Get A Guaranteed Offer</h5>
          <p class="offer-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('assets/image/22.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('assets/image/offer-2.png')}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">Make A Strong Offer On Your New Home</h5>
          <p class="offer-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('assets/image/33.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('assets/image/offer-3.png')}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">Move In On Your Schedule</h5>
          <p class="offer-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('assets/image/44.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('assets/image/offer-4.png')}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">Get Full Market Value When We Sell Your Home</h5>
          <p class="offer-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
        </div>
      </div>
    </div>
  </section>

  <section class="Curious-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h3 class="text-white curious-heading">Curious how much we’ll offer for your home?</h3>

          <a href="cash-cloe.html" class="btn btn-read-more-1">Start here</a>
          <!-- <a href="cash-cloe.html"><button type="button" class="btn btn-read-more-1">Start here</button></a> -->
        </div>
      </div>
    </div>
  </section>

  <section class="take-their-word">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h4 class="take-their-word-heading">Take their word for it</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <iframe class="shadow iframe-padding pull-right" width="97%" height="250" src="https://www.youtube.com/embed/hnp1pt8biD4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="col-md-6 peter-mark-section">
          <p class="peter-mark-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
          <p class="peter-mark">Peter Mark</p>
          <p>ListQuick Trade-In Client</p>
        </div>
      </div>

      <!-- <div class="row testimonial-slider-row">
        <div class="col-md-12">
          <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <div class="indicator-padding">
              <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
              </ol>
            </div>

            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="col-md-12 col-lg-3" style="float: left">
                  <div class="card mb-2 shadow">
                    <img class="card-img-top" src="image/men-image.png" alt="Card image cap" />
                    <div class="card-body-1">
                      <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
                      <a href="#" class="read-anchor">Read the full story</a>
                      <h5 class="men-name">James smith</h5>
                      <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-3" style="float: left">
                  <div class="card mb-2 shadow">
                    <img class="card-img-top" src="image/men-image.png" alt="Card image cap" />
                    <div class="card-body-1">
                      <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
                      <a href="#" class="read-anchor">Read the full story</a>
                      <h5 class="men-name">James smith</h5>
                      <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-3" style="float: left">
                  <div class="card mb-2 shadow">
                    <img class="card-img-top" src="image/men-image.png" alt="Card image cap" />
                    <div class="card-body-1">
                      <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
                      <a href="#" class="read-anchor">Read the full story</a>
                      <h5 class="men-name">James smith</h5>
                      <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-lg-3" style="float: left">
                  <div class="card mb-2 shadow">
                    <img class="card-img-top" src="image/men-image.png" alt="Card image cap" />
                    <div class="card-body-1">
                      <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
                      <a href="#" class="read-anchor">Read the full story</a>
                      <h5 class="men-name">James smith</h5>
                      <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div> -->

      <div class="row multiple-items">
        <div class="col">
          <div class="card mb-2 shadow">
            <img class="card-img-top" src="{{asset('assets/image/men-image.png')}}" alt="Card image cap" />
            <div class="card-body-1">
              <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <a href="#" class="read-anchor">Read the full story</a>
              <h5 class="men-name">James smith</h5>
              <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-2 shadow">
            <img class="card-img-top" src="{{asset('assets/image/men-image.png')}}" alt="Card image cap" />
            <div class="card-body-1">
              <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <a href="#" class="read-anchor">Read the full story</a>
              <h5 class="men-name">James smith</h5>
              <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-2 shadow">
            <img class="card-img-top" src="{{asset('assets/image/men-image.png')}}" alt="Card image cap" />
            <div class="card-body-1">
              <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <a href="#" class="read-anchor">Read the full story</a>
              <h5 class="men-name">James smith</h5>
              <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-2 shadow">
            <img class="card-img-top" src="{{asset('assets/image/men-image.png')}}" alt="Card image cap" />
            <div class="card-body-1">
              <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <a href="#" class="read-anchor">Read the full story</a>
              <h5 class="men-name">James smith</h5>
              <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-2 shadow">
            <img class="card-img-top" src="{{asset('assets/image/men-image.png')}}" alt="Card image cap" />
            <div class="card-body-1">
              <p class="card-text card-text-p">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem</p>
              <a href="#" class="read-anchor">Read the full story</a>
              <h5 class="men-name">James smith</h5>
              <p class="card-paragraph">ListQuick Trade-in Certified Agent</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="not-a-homeowner">
    <div class="container">
      <div class="row">
        <div class="col-md-5 not-a-homeowner-text">
          <h3 class="not-homeowner-heading">Not a homeowner?</h3>
          <h3 class="not-homeowner-heading">Make your strongest offer with ListQuick Cash Offer</h3>
          <p class="home-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
          <!-- <a href="buying.html"><button type="button" class="btn btn-read-more read-btn">Learn more</button></a> -->
          <a href="buying.html" class="btn btn-read-more read-btn">Learn more</a>
        </div>

        <div class="offset-md-1 col-md-6">
          <img src="{{asset('assets/image/resort-image.png')}}" class="resort-image" />
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 why-listquick">
          <h3 class="text-center why-listquick-heading">Why ListQuick</h3>
          <p class="text-center listquick-para-1">Lorem Ipsum is simply dummy text of the printing</p>
          <p class="listquick-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sstandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>
          <p class="listquick-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
          <p class="listquick-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>
          <p class="text-center red-comment">Read real reviews from our customers</p>
        </div>
      </div>
    </div>
  </section>

  <section class="client-faq">
    <div class="container">
      <div class="row">
        <!-- accordian-1 -->
        <div class="col-md-12">
          <h4 class="faq-heading">Client FAQs</h4>

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
        </div>

        <!-- accordian-1-end -->

        <!-- accordian-2 -->

        <div class="col-md-12">
          <h4 class="faq-heading">Agent FAQss</h4>

          <hr />
          <div class="row">
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo5" class="collapse-anchor">What Is Homelight For Real Estate Agents?<i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo5" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo6" class="collapse-anchor">How Does Homelight Work? <i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo6" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo7" class="collapse-anchor">What Does It Cost? <i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo7" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo8" class="collapse-anchor">Can I Pay To Boost My Homelight Ranking? <i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo8" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo9" class="collapse-anchor">How Can I Boost My Homelight Rankings? <i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo9" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
          </div>
        </div>

        <!-- accordian-2-end -->
      </div>
    </div>
  </section>

@endsection