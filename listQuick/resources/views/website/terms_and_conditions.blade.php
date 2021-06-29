@extends('website.layout.master')
@section('content')
  <section id="contact-us">
    <div class="container">
      <div class="row contact-row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3>Terms & Conditions</h3>
        </div>
        <div class="row">        
          <div class="col-lg-6 col-md-6 col-sm-12">
            {!! $termsAndConditions->description??"Not Available" !!}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection