@extends('website.layout.master')
@section('content')
   <section class="perfect-real-state">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center perfect-real-state-h3">Hire The Perfect Real Estate</h3>
            <h3 class="text-center perfect-real-state-h3">Agent In Your Area</h3>

            <div class="row real-state-para">
              <div class="col-md-12">
                <p class="text-center perfect-real-state-p">Top real estate agents sell homes faster and for more money. Now, it’s easy to find them. We analyze millions of real estate transactions to compare real estate agents near you on the metrics that matter: how well they sell homes like yours.</p>
                <p class="text-center perfect-real-state-p">Get free, objective, performance-based recommendations for top real estate agents in your neighborhood. <a href="">Learn more</a></p>
              </div>
            </div>

            <form action="" class="form-1b shadow">
              <input type="text" placeholder="Enter your Address" name="search" class="find-search" />
              <button type="submit" class="find-btn">Find an Agent</button>
            </form>

            <div class="bg-dark black-box">
              <div class="row-1 black-box-1">
                <div><img src="image/card-image.png" class="small-img" /></div>
                <div class="black-box-heading">
                  <h4 class="text-white lorem-heading">lorem ipsum</h4>
                  <p class="text-white lorem-para">Boston,MA</p>
                  <img src="image/star.png" class="star" />
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

            <div class="iframe-center">
              <iframe class="shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57893.156010951745!2d67.05638591140513!3d24.92108971034303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb338b808bfd6b1%3A0x997b1a02c2570822!2sGulshan-e-Iqbal%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1601567245740!5m2!1sen!2s" width="85%" height="430" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>  
@endsection
@push('js')
  
@endpush