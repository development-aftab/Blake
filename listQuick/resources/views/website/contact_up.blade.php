@extends('website.layout.master')
@section('content')
  <section id="contact-us">
    <div class="container">
      <div class="row contact-row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3>Contact us</h3>
          <p class="contact-us-paragraph">{!! $contactUsPageContent->description??"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." !!}</p>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
          {{--<form class="contact-us-form" action="{{ route('contact_us_process') }}" method="post">--}}
          <form class="contact-us-form" action="{{ route('contact_process') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp" placeholder="Full Name*" required />
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email"  />
            </div>

            <div class="form-group">
              <input type="number" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Phone" />
            </div>

            <div class="form-group">
              <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message*"></textarea>
            </div>
            <button type="submit" class="btn btn-danger custom-btn-form">Contact us</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection