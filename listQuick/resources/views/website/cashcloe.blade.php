@extends('website.layout.master')

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
          <img src="{{asset('website/image/11.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('website')}}/{{$guaranteed_offer->image}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">{!!$guaranteed_offer->heading??""!!}</h5>
          <p class="offer-paragraph">{!!$guaranteed_offer->description??""!!}</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('website/image/22.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('website')}}/{{$strong_offer->image}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">{!!$strong_offer->heading??""!!}</h5>
          <p class="offer-paragraph">{!!$strong_offer->description??""!!}</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('website/image/33.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('website')}}/{{$move_on_schedule->image}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">{!!$move_on_schedule->heading??""!!}</h5>
          <p class="offer-paragraph">{!!$move_on_schedule->description??""!!}</p>
        </div>
      </div>

      <div class="row align-items-center line-border">
        <div class="col-md-1 col-2">
          <img src="{{asset('website/image/44.png')}}" class="number-image" />
        </div>

        <div class="offset-md-1 col-md-2 col-10">
          <img src="{{asset('website')}}/{{$full_market_value->image}}" class="offer-image" />
        </div>

        <div class="offset-md-1 col-md-6 col-12 offer-boxes">
          <h5 class="offer-heading">{!!$full_market_value->heading??""!!}</h5>
          <p class="offer-paragraph">{!!$full_market_value->description??""!!}</p>
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
            <img class="card-img-top" src="{{asset('website/image/men-image.png')}}" alt="Card image cap" />
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
            <img class="card-img-top" src="{{asset('website/image/men-image.png')}}" alt="Card image cap" />
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
            <img class="card-img-top" src="{{asset('website/image/men-image.png')}}" alt="Card image cap" />
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
            <img class="card-img-top" src="{{asset('website/image/men-image.png')}}" alt="Card image cap" />
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
            <img class="card-img-top" src="{{asset('website/image/men-image.png')}}" alt="Card image cap" />
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
          <h3 class="not-homeowner-heading">{!!$strong_cash_offer->heading??""!!}</h3>
          <p class="home-para">{!!$strong_cash_offer->description??""!!}</p>
          <!-- <a href="buying.html"><button type="button" class="btn btn-read-more read-btn">Learn more</button></a> -->
          <a href="buying.html" class="btn btn-read-more read-btn">Learn more</a>
        </div>

        <div class="offset-md-1 col-md-6">
          <img src="{{asset('website')}}/{{$strong_cash_offer->image??''}}" class="resort-image" />
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 why-listquick">
          <h3 class="text-center why-listquick-heading">Why ListQuick</h3>
          <p class="text-center listquick-para-1">{!!$why_listquick->heading??""!!}</p>
          <p class="listquick-para">{!!$why_listquick->description??""!!}</p>
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
            @foreach($clientfaqs as $item)
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo" class="collapse-anchor">{{$item->title??"Not Available"}}<i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo" class="collapse">{!!$item->description??"Not Available"!!}</div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- accordian-1-end -->

        <!-- accordian-2 -->

        <div class="col-md-12">
          <h4 class="faq-heading">Agent FAQss</h4>

          <hr />
          <div class="row">
            @foreach($agentfaqs as $item)
            <div class="col-md-12">
              <a data-toggle="collapse" data-target="#demo5" class="collapse-anchor">{{$item->title??"Not Available"}}<i class="fa fa-angle-right pull-right"></i></a>
              <div id="demo5" class="collapse">{!!$item->description??"Not Available"!!}</div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- accordian-2-end -->
      </div>
    </div>
  </section>

@endsection