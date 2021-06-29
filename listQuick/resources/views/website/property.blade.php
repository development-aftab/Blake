<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('website/property/css/style.css')}}" />
    <script src="https://kit.fontawesome.com/75b143974a.js" crossorigin="anonymous"></script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&callback=initAutocomplete&libraries=places&v=weekly" defer></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('website/autocomplete/style.css')}}" /> -->
    <style type="text/css">
        #back_location {
            position: absolute;
            height: 61px;
            width: 196px;
            background: #ffffff;
            color: #ec1c24;
            bottom: 60px;
            border: none;
            font-weight: 800;
            left: 60px;
        }
        .center-4 {
            padding-top: 140px;
            padding-bottom: 444px;
        }
        .background a img {

        }
        .background {
            height: 100vh;
        }
        @media (max-width: 768px) {
            .background a img {
                padding: 50px 30px;
            }
            .center-3 {
                padding-top: 0px;
            }
            .logo-link{
                padding: 34px 0 34px 5% !important;
            }
        }
        @media (max-width: 766px) {
            .background {
                height: auto;
            }

            #back_location {
                position: relative;
                height: 61px;
                width: 196px;
                background: #ffffff;
                color: #ec1c24;
                bottom: unset;
                border: none;
                font-weight: 800;
                left: 50%;
                top: -50px;
                transform: translateX(-50%);
            }
            .center-4 {
                padding-bottom: 298px;
            }
            .center-2 {
                padding-bottom: 100px;
            }
            .center-3 {
                padding-bottom: 123px;
            }
            .center-5 {
                padding-top: 10px;
                padding-bottom: 90px;
            }
            .center-6 {
                padding-top: 80px;
                padding-bottom: 127px;
            }
            .center-7 {
                padding-bottom: 215px;
            }
            .center-8 {
                padding-bottom: 308px;
            }
            .center-9 {
                padding-bottom: 54px;
            }
            .center-10 {
                padding-bottom: 318px;
            }
        }
            @media (max-width: 575px) {
                /*#back_location {left: 33%; }*/
            }
        @media (max-width: 480px) {
            .background a img {
                padding: 50px 30px;
            }
            /*#back_location {left: 30%; }*/
        }
        @media (max-width: 375px) {
            /*#back_location {left: 24%; }*/
        }
    </style>
    <title>.: What is your address :.</title>
  </head>
  <body>

          <input type="hidden" name="location_save" id="location_save" value="{{$address??''}}">
          <input type="hidden" name="latt" id="latt" value="{{$lat??''}}">
          <input type="hidden" name="lngg" id="lngg" value="{{$lng??''}}">
          <input type="hidden" name="state" id="state" class="form-control">
          <input type="hidden" name="confirm_location_save" id="confirm_location_save">
          <input type="hidden" name="unit_number_save" id="unit_number_save">
          <input type="hidden" name="property_type_id_save" id="property_type_id_save">
          <input type="hidden" name="worth_save" id="worth_save">
          <input type="hidden" name="sale_time_save" id="sale_time_save">
          <input type="hidden" name="source_heard_save" id="source_heard_save">
          <input type="hidden" name="top_agents_save" id="top_agents_save">
          <input type="hidden" name="contact_name_save" id="contact_name_save">
          <input type="hidden" name="contact_phone_save" id="contact_phone_save">
          <input type="hidden" name="buy_property_save" id="buy_property_save">
          <input type="hidden" name="zip_code" id="zip_code">

 {{--<button type="button" id="back_location" style="cursor: pointer;" name="back_location" class="blake-btn back_location  home" ><span class="glyphicon glyphicon-arrow-left">Back</span></button>--}}
  {{-- <link rel="icon" type="image/png"  href=""> --}}

    <section class="background">
      <a class="logo-link" href="{{route('/')}}" style="display: inline-block; padding: 34px 0 34px 159px;"><img  sizes="16x16" src="{{asset('website/image/logo.png')}}" style="width: 250px"></a>
      <div class="container"  id="what-is-your-address">
        <!-- PAGE-1-START -->
       {{--  <form method="post" action="{{ route('address_process') }}"> --}}
          {{-- @csrf --}}

          <div class="row center-1 center-4 text-center">
            <div class="col-lg-5 col-md-6 col-sm-10 col-12 mx-auto">
              @if(Session()->get('requestType')  == 'Sale')
              <h3 class="h3-padding h3-heading">What is your address?</h3>
              <p class="blake-size-17">FULL PROPERTY ADDRESS</p>
              @else
              <h3 class="h3-padding h3-heading"><strong>Where are you looking to Buy?</strong></h3>
              @endif

              <span style="color: red;float: left;" class="address-error"></span>
              <!-- <input type="text" class="form-control blake-input autocomplete" placeholder="Enter a Location" name="location" id="location" onFocus="geolocate()" class="autocomplete" /> -->
              <input type="text" required name="autocomplete" id="autocomplete" class="form-control blake-input" placeholder="Select Location">
              <input type="hidden" name="latitude" id="latitude" class="form-control">
              <input type="hidden" name="longitude" id="longitude" class="form-control">
                      <input type="button" id="location_next" style="cursor: pointer;" name="location_next" class="blake-btn next action-button my-next new-next btn-1 btn-radius location_next" value="Next" />
                  </div>
          </div>
        {{-- </form> --}}
        <!-- PAGE-1-END -->
      </div>
        <button type="button" id="back_location" style="cursor: pointer;" name="back_location" class="blake-btn back_location  home" ><span class="glyphicon glyphicon-arrow-left">Back</span></button>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <script src="{{asset('website')}}/property/js/index.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <!-- <script src="{{asset('website/autocomplete/index.js')}}"></script> -->
  </body>
</html>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&libraries=places"></script>



<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU=places&callback=initAutocomplete" type="text/javascript"></script> -->
<script>
   $(document).ready(function() {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
   });
</script>
<script>
   google.maps.event.addDomListener(window, 'load', initialize);

   function initialize() {
       var input = document.getElementById('autocomplete');
/*       var options = {
           types: ['places'],
//           types: ['address'],
           componentRestrictions: {
               country: 'us'
           }
       };*/
//        var autocomplete = new google.maps.places.Autocomplete(input, options);
       var autocomplete = new google.maps.places.Autocomplete(input);
       var zip_code=null;
       autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
           console.log(place);
          /* for (var i = 0; i < place.address_components.length; i++) {
               for (var j = 0; j < place.address_components[i].types.length; j++) {
                   if (place.address_components[i].types[j] == "postal_code") {
                       zip_code = place.address_components[i].long_name;
                   }
               }

           }*/
           $('#zip_code').val(zip_code);
           $('#state').val(place.name);
           $('#latitude').val(place.geometry['location'].lat());
           $('#longitude').val(place.geometry['location'].lng());
           $('#latt').val(place.geometry['location'].lat());
           $('#lngg').val(place.geometry['location'].lng());
           $("#lat_area").removeClass("d-none");
           $("#long_area").removeClass("d-none");
       });
   }
</script>


<script type="text/javascript">

  // $("#back_location").hide();
    $(document).on('click','.reload',function(e){
location.reload();
  });
    $(document).on('click','.home',function(e){
window.location.replace("{{route('/')}}");
  });
  /*$("body").delegate(".autocomplete", "focus", function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(position => {
        const geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        const circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  });*/


  $(document).on('click','.location_next',function(e){
    e.preventDefault();
      var location =  $('#autocomplete').val();
      if(location==''){
        $('.address-error').html('&nbsp;Address Field is Required.');
        return false;
      }else{
        $('.address-error').html('');
      }//end if else.
      $('#location_save').val(location);
      loction(location)

  });

/*  @if(isset($_GET["name"]))
    loction("{{ $_GET["name"]??'' }}");
  @endif*/
  @if($address)
    loction("{{ $address??'' }}");
  @endif
  function loction(location){
    $('#location_save').val(location);
    $("#back_location").removeClass("home");
    $('#back_location').addClass('reload')

     @if(Session()->get('requestType')  == 'Sale')
      $.ajax({
      url: "{{ route('address_process') }}/"+location,
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
    @else


     unitnumber='00000';
     $.ajax({
        url: "{{ route('property_type_id') }}/"+unitnumber,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });

    @endif

  }


  $(document).on('click','.btn_conform_location',function(e){
    e.preventDefault();
     $('#back_location').addClass('reload')
      var confirm_location_save =  $(this).attr('value');
      $("#back_location").val(confirm_location_save);

      $("#back_location").removeClass("btn_conform_location");
      var selected_location = $('#location_save').val();
      $('#confirm_location_save').val(confirm_location_save);
      $.ajax({
        url: "{{ route('unit_number') }}/"+selected_location,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
          console.log('unit_number');
        }
      });
  });


  $(document).on('click','.unit_number',function(e){
    $('#back_location').removeClass('reload')

     @if(Session()->get('requestType')  == 'Sale')

     $("#back_location").show();
     $("#back_location").addClass("btn_conform_location");
     $('#back_location').removeClass('unit_number');
     @else
     $('#back_location').addClass('reload')
     $("#back_location").removeClass("btn_conform_location");
      $('#back_location').removeClass('unit_number');
     @endif

    e.preventDefault();

      unitnumber =  $("#unitnumber").val();
      if (typeof unitnumber === "undefined") {

       }else{
        $('#unit_number_save').val(unitnumber);
       }
      $.ajax({
        url: "{{ route('property_type_id') }}/"+unitnumber,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });

  });

  $(document).on('click','.property_id',function(e){

     $('#back_location').removeClass('reload')
      $("#back_location").addClass("unit_number");
      $('#back_location').removeClass('btn_conform_location');
      $('#back_location').removeClass('property_id');
    e.preventDefault();
      var property =  $(this).attr('data-id');
      $("#back_location").attr('data-id',property);
      $('#property_type_id_save').val(property);
      $.ajax({
        url: "{{ route('worths') }}/"+property,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });

  });


  $(document).on('click','.worth',function(e){

     $("#back_location").addClass("property_id");
     $('#back_location').removeClass('unit_number');
     $('#back_location').removeClass('worth');
    e.preventDefault();
    var worth =  $(this).attr('data-worth');
    $('#worth_save').val(worth);
     $("#back_location").attr('data-worth',worth);
    $.ajax({
      url: "{{ route('sale_time') }}/"+worth,
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
  });
 $(document).on('click','.saletime',function(e){
      $("#back_location").addClass("worth");
      $('#back_location').removeClass('property_id');
      $('#back_location').removeClass('saletime');
    e.preventDefault();
    var saletime =  $(this).attr('data-saletime');
    $('#sale_time_save').val(saletime);
    $("#back_location").attr('data-saletime',saletime);
      $.ajax({
        url: "{{ route('source_heard') }}/"+saletime,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });
  });
   $(document).on('click','.NO_add',function(e){
   location.reload();
  });
  $(document).on('click','.sourceheard',function(e){
    $("#back_location").addClass("saletime");

    $('#back_location').removeClass('worth');
    $('#back_location').removeClass('sourceheard');
    e.preventDefault();
    var sourceheard =  $(this).attr('data-sourceheard');
    $('#source_heard_save').val(sourceheard);
     $("#back_location").attr('data-sourceheard',sourceheard);
    $.ajax({
      url: "{{ route('top_agents') }}/"+sourceheard,
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
  });
  $(document).on('click','.topagents',function(e){
    $("#back_location").addClass("sourceheard");
    $('#back_location').removeClass('saletime');
    $('#back_location').removeClass('topagents');
    e.preventDefault();
      var top_agents =  $('#top_agents').val();
      if(top_agents==''){
        $('.agent-error').html('&nbsp;Full Name is Required.');
        return false;
      }else{
        $('.agent-error').html('');
      }
    $('#top_agents_save').val(top_agents);
      $.ajax({
        url: "{{ route('contact_detail') }}/"+top_agents,
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });
  });
  $(document).on('click','.contact',function(e){
    $("#back_location").addClass("topagents");
    $('#back_location').removeClass('sourceheard');
    $('#back_location').removeClass('contact');
    e.preventDefault();
    var contact_name =  $('#contact_name').val();
    if(contact_name==''){
        $('.email-error').html('&nbsp;Email is Required.');
        return false;
      }else{
        $('.email-error').html('');
      }
    $('#contact_name_save').val(contact_name);
    var contact_phone =  $('#contact_phone').val();
    if(contact_phone==''){
        $('.phone-error').html('&nbsp;Phone is Required.');
        return false;
      }else{
        $('.phone-error').html('');
      }
    $('#contact_phone_save').val(contact_phone);
    $.ajax({
      url: "{{ route('buy_property') }}/"+contact_name+'/'+contact_phone,
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
  });
  <?php
  if(Session()->get('requestType') == 'Sale'){?>
   type_of_pro = "Selling";

 <?php
  }else{
  ?>
  type_of_pro = "Buying";
<?php
 }
 ?>

  $(document).on('click','.buy_property',function(e){
     $("#back_location").addClass("contact");
    $('#back_location').removeClass('topagents');
    $('#back_location').removeClass('buy_property');
    e.preventDefault();
    var buy_property_save     =  $(this).attr('data-buyproperty');
    var state                 =  $('#state').val();
    var location_save         =  $('#location_save').val();
    var confirm_location_save =  $('#confirm_location_save').val();
    var unit_number_save      =  $('#unit_number_save').val();
    var property_type_id_save =  $('#property_type_id_save').val();
    var worth_save            =  $('#worth_save').val();
    var sale_time_save        =  $('#sale_time_save').val();
    var source_heard_save     =  $('#source_heard_save').val();
    var top_agents_save       =  $('#top_agents_save').val();
    var contact_name_save     =  $('#contact_name_save').val();
    var contact_phone_save    =  $('#contact_phone_save').val();
    var lat                   =  $('#latitude').val()?$('#latitude').val():$('#latt').val();
    var lng                   =  $('#longitude').val()?$('#longitude').val():$('#lngg').val();
    if (buy_property_save =='NOO') {
      location.href = '/buy';
    }else{
      dataSet={buy_property:buy_property_save,location:location_save,confirm_location:confirm_location_save,unit_number:unit_number_save,property_type_id:property_type_id_save,worth:worth_save,sale_time:sale_time_save,source_heard:source_heard_save,top_agents:top_agents_save,contact_name:contact_name_save,contact_phone:contact_phone_save,lat:lat,lng:lng,"_token":"{{ csrf_token() }}"}

        $.ajax({
          url: "{{ route('create_property') }}",
          type: "POST",
          data:dataSet,
          cache: false,
          success: function(html){
           showSwalLoadPage('Complete',type_of_pro,'success',"{{route('/')}}");
          },error:function(e){
           showSwal('Fail','Unable to add request try Again','error',"{{route('buy')}}");
          }
        });
    }
  });

  $('#location').focus(function() {
    $('.address-error').html('');
  });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        //this function is used for alerting in complete project.
        function showSwal(title,text,icon){
            swal({
                title:  title,
                text:   text,
                icon:   icon,
                timer:  10000,
                showCancelButton: false,
            })
        }
        //this function is used for alerting in complete project & load pages.
        function showSwalLoadPage(title,text,icon,url){
                   Swal.fire({
                      title: "<strong>"+title+"</strong>",
                      html: "<u>"+text+" Questionnaire Submitted</u><br>Results will be delivered to you within 24 hours",
                      icon: 'success',
                      timer: 10000,
                      buttons: false,
                    }).then(() => {
                                    window.location.href = url;
                   });
            // swal({
            //     title:  title,
            //     text:   text,
            //     icon:   icon,
            //     timer:  10000,
            //     showCancelButton: false,
            // }).then(() => {
            //     window.location.href = url;
            // })
        }
    </script>
       @if(session()->has('type')=='success')
            <script>
                swal({
                    icon: '{{session()->get('type')}}',
                    title: '{{session()->get('msg')}}',
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @elseif(session()->has('type')=='error')
            <script>
                swal({
                    icon: '{{session()->get('type')}}',
                    title: '{{session()->get('msg')}}',
                    showConfirmButton: false,
                    timer: 4500
                })
            </script>
        @endif