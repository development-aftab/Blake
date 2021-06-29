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
          <input type="hidden" name="selling_soon" id="selling_soon">
          <input type="hidden" name="condition_home" id="condition_home">
          <input type="hidden" name="contract" id="contract">
          <input type="hidden" name="tell_us" id="tell_us">
          <input type="hidden" name="source_heard_save" id="source_heard_save">
          <input type="hidden" name="top_agents_save" id="top_agents_save">
          <input type="hidden" name="contact_name_save" id="contact_name_save">
          <input type="hidden" name="contact_phone_save" id="contact_phone_save">
          <input type="hidden" name="buy_property_save" id="buy_property_save">
 <button type="button" id="back_location" style="cursor: pointer;" name="back_location" class="blake-btn back_location home" ><span class="glyphicon glyphicon-arrow-left">Back</span></button>
    <section class="background" >
       {{--<a href="{{route('/')}}"><img style="padding: 45px;" sizes="16x16" src="{{asset('website/image/logo.png')}}" ></a>--}}
       <a href="{{route('/')}}"><img style="width: 250px" sizes="16x16" src="{{asset('website/image/logo.png')}}" ></a>
      <div class="container" id="what-is-your-address">
        <!-- PAGE-1-START -->
       {{--  <form method="post" action="{{ route('address_process') }}"> --}}
          {{-- @csrf --}}

          <div class="row center-1 center-4 text-center">
            <div class="col-lg-5 col-md-6 col-sm-10 col-12 mx-auto">

              <h3 class="h3-padding h3-heading">What is your address?</h3>
              <p class="blake-size-17">FULL PROPERTY ADDRESS</p>
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
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
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
  @if(isset($address))
    loction("{{ $address??'' }}");
  @endif
  function loction(location){
    $("#back_location").removeClass("home");
    $('#back_location').addClass('reload')
    $('#location_save').val(location);
     
      $.ajax({
      url: "{{ route('address_process') }}/"+location,
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
   
    
  }


  $(document).on('click','.btn_conform_location',function(e){
    e.preventDefault();
      $("#back_location").addClass("reload");
      var confirm_location_save =  $(this).attr('value');
      $("#back_location").val(confirm_location_save);
      var selected_loczation = $('#location_save').val();
      $('#confirm_location_save').val(confirm_location_save);
      $.ajax({
        url: "{{ route('selling_soon') }}",
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
          console.log('unit_number');
        }
      });
  });

 
  $(document).on('click','.selling_soon',function(e){
     $('#back_location').removeClass('reload')
     $("#back_location").show();
     $("#back_location").addClass("btn_conform_location");
     $('#back_location').removeClass('selling_soon');
    e.preventDefault();
      selling_soon = $(this).attr('data-selling_soon');
      $("#selling_soon").val(selling_soon);
         console.log(selling_soon);
      
      $.ajax({
        url: "{{ route('condition_of_home') }}",
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });

  });
   
  $(document).on('click','.condition_home',function(e){
      $("#back_location").addClass("selling_soon");
      $('#back_location').removeClass('btn_conform_location');
      $('#back_location').removeClass('condition_home');
    e.preventDefault();
      var condition_home =  $(this).attr('data-condition');
      $("#back_location").attr('data-condition',condition_home);
      $('#condition_home').val(condition_home);
      $.ajax({
        url: "{{ route('contract_with_agent') }}",
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });

  });

  
  $(document).on('click','.contract',function(e){
     $("#back_location").addClass("condition_home");
     $('#back_location').removeClass('selling_soon');
     $('#back_location').removeClass('contract');
    e.preventDefault();
    var contract =  $(this).attr('data-contract');
    $('#contract').val(contract);
     $("#back_location").attr('data-contract',contract);
    $.ajax({
      url: "{{ route('we_need_know') }}",
      type: "GET",
      cache: false,
      success: function(html){
        $("#what-is-your-address").html(html);
      }
    });
  });
 $(document).on('click','#tell_us',function(e){
      $("#back_location").addClass("contract");
      $('#back_location').removeClass('condition_home');
      $('#back_location').removeClass('tell_us');
    e.preventDefault();
    var tell_us =  $('#anything_more').val();
    $('#tell_us').val(tell_us); 
    $("#back_location").val(tell_us);
      $.ajax({
        url: "{{ route('estimated_sent') }}",
        type: "GET",
        cache: false,
        success: function(html){
          $("#what-is-your-address").html(html);
        }
      });
  });
   $(document).on('click','#submit_req',function(e){
     $("#back_location").addClass("tell_us");
    $('#back_location').removeClass('submit_req');
    $('#back_location').removeClass('contract');
    e.preventDefault();
   
    var state                 =  $('#state').val();
    var location_save         =  $('#location_save').val();
    var confirm_location_save =  $('#confirm_location_save').val();
    var selling_soon      =  $('#selling_soon').val();
    var condition_home        =  $('#condition_home').val();
    var contract            =  $('#contract').val();
    var tell_us        =  $('#tell_us').val();
    var name     =  $('#name').val();
    var email       =  $('#email').val();
    var phone     =  $('#phone').val();
    
    var lat                   =  $('#latitude').val()?$('#latitude').val():$('#latt').val();
    var lng                   =  $('#longitude').val()?$('#longitude').val():$('#lngg').val();
  
      dataSet={state:state,location:location_save,confirm_location:confirm_location_save,selling_time:selling_soon,home_condition:condition_home,contract:contract,other:tell_us,phone:phone,email:email,name:name,lat:lat,lng:lng,"_token":"{{ csrf_token() }}"}
      console.log(dataSet);

        $.ajax({
          url: "{{ route('create_estimate') }}",
          type: "POST",
          data:dataSet,
          cache: false,
          success: function(html){
           showSwalLoadPage('Complete','Home Estimate','success',"{{route('/')}}");
          },error:function(e){
           showSwal('Fail','Unable to add request try again','error',"{{route('homes_estimate')}}");
          }
        }); 
          
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