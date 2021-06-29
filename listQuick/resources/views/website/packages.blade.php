<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pygment_trac.css') }}">
    <title>ListQuick</title>

    <style>
      body{
        font-family: Nanum Gothic;  
      }

      span.field label {
          font-size: 25px;
      }


      .custom-row {
          border-top: 2px solid #34343A;
      }

      .plan-card .col-md-6:nth-child(1) {
            background-color: #FF5757;
            padding: 60px 40px;
            border: 0;
        }

        .plan-card .col-md-6:nth-child(1) .custom-card>h2, .plan-card .col-md-6:nth-child(1) .custom-card>h3 {
            color: white;
        }

        .plan-card .col-md-6:nth-child(2) {
                background-color: #34343A;
                border: 0;
            display: inline-block;
            padding: 60px 40px;
        }

        .plan-card .col-md-6:nth-child(2) .custom-card {
            background-color: white;
                width: 600px;
            margin: 0 auto;

        }
        .plan-card .col-md-6:nth-child(1) .custom-card h1, .plan-card .col-md-6:nth-child(1) .custom-card p {
            color: white;
        }
        .header h1 {
            text-align: center;
        }

        .row.text-row {
            /*margin: 0 auto;*/
            /*max-width: 30%;*/
        }

        .row.text-row h1 {
        font-size: 60px;
        text-decoration: none;
        font-family: Nanum Gothic;
        margin-bottom: 0;
            text-align: center;
            width:100%;
        }

      .validate-btn{
    font-size: 16px;
    margin-top: 20px;
    padding: 7px;
    margin-bottom: 30px;
    border-radius: 7px;
    border: 1px solid #555;
    color: #eee;
    background-color: #555;
    cursor: pointer;
    }
      .pricing-page-body {
        background-color: white;
        padding: 0;
      }
      section.pricing-plan-sec {
        font-family: GOTHIC;
        padding: 20px 0;

        background-color: white;
      }
      section.pricing-plan-sec h1 {
     font-family: Nanum Gothic;  
    font-size: 30px;
    line-height: 1.8;
        font-weight: 700;
        margin-bottom: 50px;
      }
      section.pricing-plan-sec p {
          font-family: Nanum Gothic;
          font-size: 19px;
          line-height: 1.8;
          margin-bottom: 50px;
          color: #fff;
      }
      section.pricing-plan-sec hr {
        border-top: 3px solid #ff1949;
        width: 60px;
        margin-left: 0;
        margin-top: -1px;
      }
      .plan-card {
        text-align: center;
        width: 100%;
      }
      .plan-card .col-md-6 {
    border: 3px solid #000;
}
      .plan-card h2 {
    font-weight: 700;
    font-family: Nanum Gothic;
    font-size: 50px;
    font-style: italic;
    margin-bottom: 50px;
      }

      .pricing-plan-sec h3 {
          /* color: #ff1949; */
    font-weight: 800;
    font-size: 60px;
    font-family: Nanum Gothic;

      }

      ul.plan-list {
        padding: 0;
        list-style: none;
        margin-top: 40px;
      }

      ul.plan-list li {
        padding-bottom: 15px;
        color: #636364;
        font-size: 18px;
        font-weight: 500;
      }

      .btn.plan-btn {
        background-color: #636364;
        border-radius: 0;
        color: white;
        font-family: GOTHIC-BOLD;
        padding: 10px 40px;
        font-weight: 700;
      }
      .plan-card-col {
        display: flex;
        justify-content: space-around;
        margin-top: 25px;
      }
      .plan-card.plan1 ul {
        margin-top: 70px;
      }
      .plan-card.plan2 span {
        font-weight: 700;
        color: #ff1949;
      }
    </style>
  </head>

  <body class="pricing-page-body">
    <section class="pricing-plan-sec">
      <div class="container-fluid">
        <div class="row">
          {{--<img src="{{asset('website/image/logo_dash.png')}}" width="215px">--}}
          <a href="{{route('/')}}"><img src="{{asset('website/image/logo_dash.png')}}" width="215px"></a>
        </div>
        <div class="row text-row" style="">
          <h1>Congrats & Welcome!</h1>
        </div>
        {{-- <div class="row">
          <div class="col-md-5">
            <a href="/dashboard"><i class="fa fa-home fa-fw"></i></a>
            <hr />
            
             <h1>Your FREE (30) DAY TRIAL has expired</h1>
            <p style="width: 507px;">Provide payment information below to active your ListQuick Certified Agent Profile.</p>
          </div>
        </div> --}}
        <div class="row">
          <div class="col-md-12 plan-card-col">
            @foreach($packages as $key=>$package)
              <form class="plan-card" style="@if($key==0) display:none @endif" id="form{{ $key }}"  method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <input type="hidden" name="amount" value="{{$package->price}}">
                <input type="hidden" name="package_name" value="{{$package->name}}">
                <div class="row custom-row">
                  <div class="col-md-6">
                      <div class="custom-card">
                  <h1>Your ListQuick Certified Agent Application has been Approved!</h1>

                  <h2>ListQuick Certified Agent Subscription</h2>
                  <h3>${{$package->price}}/mo</h3>
                  <ul class="plan-list">
                    <li>{!!$package->description!!}</li>
                  </ul>    
                  </div>   
                  </div> 
                  <div class="col-md-6">
                      <p>Enter your information to officially join our network of the top agents in the country.</p>
                  <div class="custom-card">
                      <section>
                    <div>
                      <span class="field">
                        <label for="ccnum">Card Number</label>
                        <input placeholder="---- ---- ---- ----" type="tel" size="19" name="cardNumber" value="" id="ccnum{{ $key }}" class="form-control">
                      </span>
                      <div><small>type: <strong id="ccnum-type{{ $key }}">invalid</strong></small></div>
                    </div>
                    <div>
                      <span class="field">
                        <label for="expiry">Expiration</label>
                        <input placeholder="-- / --" size="7" type="tel" name="expiration" value="" id="expiry{{ $key }}">
                      </span>

                      <span class="cvc field">
                        <label for="cvc">CVC</label>
                        <input placeholder="---"  size="4" type="tel" name="cvv" value="" id="cvc{{ $key }}">
                      </span>
                    </div>
                    <div>
                      <button class="validate-btn" type="button" id="submit{{ $key }}" style="cursor: pointer">Validate</button>
                      <div id="result{{ $key }}" class="emoji"></div>
                    </div>
                  </section>                   
                </div>
                  </div>
                </div>
                {{-- <div class="custom-card">
                  <h2>{{$package->name}}</h2>
                  <h3>${{$package->price}}</h3>
                  <ul class="plan-list">
                    <li>{!!$package->description!!}</li>
                  </ul>            
                  <section>
                    <div>
                      <span class="field">
                        <label for="ccnum">Card Number</label>
                        <input placeholder="---- ---- ---- ----" type="tel" size="19" name="cardNumber" value="" id="ccnum{{ $key }}" class="form-control">
                      </span>
                      <div><small>type: <strong id="ccnum-type{{ $key }}">invalid</strong></small></div>
                    </div>
                    <div>
                      <span class="field">
                        <label for="expiry">Expiration</label>
                        <input placeholder="-- / --" size="7" type="tel" name="expiration" value="" id="expiry{{ $key }}">
                      </span>

                      <span class="cvc field">
                        <label for="cvc">CVC</label>
                        <input placeholder="---"  size="4" type="tel" name="cvv" value="" id="cvc{{ $key }}">
                      </span>
                    </div>
                    <div>
                      <button class="validate-btn" type="button" id="submit{{ $key }}">Validate</button>
                      <div id="result{{ $key }}" class="emoji"></div>
                    </div>
                  </section>                   
                </div> --}}
              </form>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('/js/scale.fix.js') }}"></script>
    <script src="{{ asset('/js/payform.min.js') }}"></script>
    <!-- <script src="{{ asset('/js/form.js') }}"></script> -->
  </body>
</html>


    <script type="text/javascript">
      (function() {
  var ccnum  = document.getElementById('ccnum1'),
      type   = document.getElementById('ccnum-type1'),
      expiry = document.getElementById('expiry1'),
      cvc    = document.getElementById('cvc1'),
      submit = document.getElementById('submit1'),
      result = document.getElementById('result1');

  payform.cardNumberInput(ccnum);
  payform.expiryInput(expiry);
  payform.cvcInput(cvc);

  ccnum.addEventListener('input',   updateType);

  submit.addEventListener('click', function() {

    var valid     = [],
        expiryObj = payform.parseCardExpiry(expiry.value);

    valid.push(fieldStatus(ccnum,  payform.validateCardNumber(ccnum.value)));
    valid.push(fieldStatus(expiry, payform.validateCardExpiry(expiryObj)));
    valid.push(fieldStatus(cvc,    payform.validateCardCVC(cvc.value, type.innerHTML)));

    result.className = 'emoji ' + (valid.every(Boolean) ? 'valid' : 'invalid');

    if(jQuery.inArray(false, valid) != -1) {
    console.log("is in array");
} else {
   $.ajax({
                        type: 'POST',
                        url: "{{route('buy_package_process')}}",
                        // dataType: "json",
                        data: $('#form1').serialize(),
                        success: function(result) {
                          console.log(result);
                          if(result.result=='success'){
                                swal({
                                    title: 'Done',
                                    text: result.msg,
                                    icon: 'success',
                                    timer: 2000,
                                    buttons: false,
                                }).then(() => {
                                  window.location.href = "/dashboard";
                                })
                            }else{
                                showSwal('OOPS',result.msg,'error');
                            }
                        },
                        error : function(error) {
                            showSwal('OOPS','Invalid Email Address or Password, Try agin.','error');
                        }
                    });
} 


  });

  function updateType(e) {
    var cardType = payform.parseCardType(e.target.value);
    type.innerHTML = cardType || 'invalid';
  }


  function fieldStatus(input, valid) {
    if (valid) {
      removeClass(input.parentNode, 'error');
    } else {
      addClass(input.parentNode, 'error');
    }
    return valid;
  }

  function addClass(ele, _class) {
    if (ele.className.indexOf(_class) === -1) {
      ele.className += ' ' + _class;
    }
  }

  function removeClass(ele, _class) {
    if (ele.className.indexOf(_class) !== -1) {
      ele.className = ele.className.replace(_class, '');
    }
  }
})();
(function() {
  var ccnum  = document.getElementById('ccnum0'),
      type   = document.getElementById('ccnum-type0'),
      expiry = document.getElementById('expiry0'),
      cvc    = document.getElementById('cvc0'),
      submit = document.getElementById('submit0'),
      result = document.getElementById('result0');

  payform.cardNumberInput(ccnum);
  payform.expiryInput(expiry);
  payform.cvcInput(cvc);

  ccnum.addEventListener('input',   updateType);

  submit.addEventListener('click', function() {
    var valid     = [],
        expiryObj = payform.parseCardExpiry(expiry.value);

    valid.push(fieldStatus(ccnum,  payform.validateCardNumber(ccnum.value)));
    valid.push(fieldStatus(expiry, payform.validateCardExpiry(expiryObj)));
    valid.push(fieldStatus(cvc,    payform.validateCardCVC(cvc.value, type.innerHTML)));

    result.className = 'emoji ' + (valid.every(Boolean) ? 'valid' : 'invalid');
        if(jQuery.inArray(false, valid) != -1) {
    console.log("is in array");
} else {
   $.ajax({
                        type: 'POST',
                        url: "{{route('buy_package_process')}}",
                        // dataType: "json",
                        data: $('#form0').serialize(),
                        success: function(result) {
                          console.log(result);
                          if(result.result=='success'){
                                swal({
                                    title: 'Done',
                                    text: result.msg,
                                    icon: 'success',
                                    timer: 2000,
                                    buttons: false,
                                }).then(() => {
                                  window.location.href = "/dashboard";
                                })
                            }else{
                                showSwal('OOPS',result.msg,'error');
                            }
                        },
                        error : function(error) {
                            showSwal('OOPS','Invalid Email Address or Password, Try agin.','error');
                        }
                    });
} 
  });

  function updateType(e) {
    var cardType = payform.parseCardType(e.target.value);
    type.innerHTML = cardType || 'invalid';
  }


  function fieldStatus(input, valid) {
    if (valid) {
      removeClass(input.parentNode, 'error');
    } else {
      addClass(input.parentNode, 'error');
    }
    return valid;
  }

  function addClass(ele, _class) {
    if (ele.className.indexOf(_class) === -1) {
      ele.className += ' ' + _class;
    }
  }

  function removeClass(ele, _class) {
    if (ele.className.indexOf(_class) !== -1) {
      ele.className = ele.className.replace(_class, '');
    }
  }
})();
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      
    </script>
    <script type="text/javascript">
      try {
          var pageTracker = _gat._getTracker("UA-38687719-2");
          pageTracker._trackPageview();
      } catch(err) {}
    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            swal({
                title:  title,
                text:   text,
                icon:   icon,
                timer:  10000,
                showCancelButton: false,
            }).then(() => {
                window.location.href = url;
            })
        }        
    </script>
