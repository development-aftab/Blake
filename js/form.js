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
