@extends('website.layout.master')

@section('content')
<section id="section-testimonial-banner">
    <div class="container card-row">
      <div class="row">
        <div class="col-lg-12">
          <h3>Listquick Is A 100% Free And Unbiased Service.</h3>
          <h3>Make More Informed Decisions About Your Home.</h3>

          <p>Top real estate agents sell homes faster and for more money. Now, it’s easy to find them. We analyze millions of real estate transactions to compare real estate agents near you on the metrics that matter: how well they sell homes like yours.</p>
          <p>
            Get free, objective, performance-based recommendations for top real estate agents in your neighborhood. <span><a href="#">Learn more</a></span>
          </p>

          <form class="form-inline">
            <div class="form-group custom-search-bar shadow">
              <input class="form-control" type="text" placeholder="Enter your address" />
              <button type="button" class="btn find-agent-btn">Find an Agent</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="" id="section-first">
    <div class="container testimonial-card-row">
      <!--=====================CARD CONTAINER START==============================-->
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card2 shadow">
            <img src="{{asset('assets/image/person-card.png')}}" alt="" />
            <div class="testimonial-card-body2">
              <div class="testimonial-text-area2">
                <p>The service that ListQuik provided was a tremendous help. HomeLight was able to match our specific situation and needs to a selection of local realtors and remove a lot of the legwork from the selection process.</p>

                <h5>Peter smith</h5>
                <p>Florida</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card2 shadow">
            <img src="{{asset('assets/image/person-card.png')}}" alt="" />
            <div class="testimonial-card-body2">
              <div class="testimonial-text-area2">
                <p>The service that ListQuik provided was a tremendous help. HomeLight was able to match our specific situation and needs to a selection of local realtors and remove a lot of the legwork from the selection process.</p>

                <h5>Peter smith</h5>
                <p>Florida</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="testimonial-card2 shadow">
            <img src="{{asset('assets/image/person-card.png')}}" alt="" />
            <div class="testimonial-card-body2">
              <div class="testimonial-text-area2">
                <p>The service that ListQuik provided was a tremendous help. HomeLight was able to match our specific situation and needs to a selection of local realtors and remove a lot of the legwork from the selection process.</p>

                <h5>Peter smith</h5>
                <p>Florida</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--CARD ROW END HERE-->
    </div>
    <!--=====================CARD CONTAINER END==============================-->

    <div class="container testimonial-card-row">
      <div class="select-sellers">
        <select class="form-control">
          <option>Sellers</option>
          <option>Buyer</option>
        </select>
      </div>
    </div>
  </section>

  <section class="feedback">
    <!--====================FEEDBACK SECTION===========================-->
    <div class="container">
      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/blue.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/orange.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/gray.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/dark-blue.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/dark-orange.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/blue.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset("assets/image/dark-gray.png")}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/orange.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/gray.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="feedback-card testimonial-card-row">
        <div class="row1">
          <div class="col10-left">
            <a href="#">
              <div class="img-container">
                <img src="{{asset('assets/image/blue.png')}}" alt="" />
                <div class="img-text">UD</div>
              </div>
            </a>
          </div>
          <div class="col10">
            <p>Nov 28, 2020</p>
          </div>
        </div>

        <div class="row2">
          <div class="col10">
            <blockquote>ListQuick provided several options for choosing a realtor. After interviewing several we chose a true professional Aaron Novello.</blockquote>
          </div>
          <div class="col10">
            <a href="#"><i class="fas fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!--FEEDBACK CONTAINER END-->
  </section>

  <section>
    <div class="container">
      <nav aria-label="">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1"> <span class="prev-btn">Prev</span></a>
          </li>
          <li class="page-item"><a class="page-link active" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">...</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
@endsection