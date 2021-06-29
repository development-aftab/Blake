@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet"/>
    {{--<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">--}}
    <link href="{{asset('plugins/components/jqueryui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <style>

        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;
        }
        .nav-pills>li>a{
            cursor: default;;
            background-color: inherit;
        }
        .nav-pills>li>a:focus,.nav-tabs>li>a:focus, .nav-pills>li>a:hover, .nav-tabs>li>a:hover {
            border: 1px solid transparent!important;
            background-color: inherit!important;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }
        .error-block{
            background-color: #ff9d9d;
            color: #EF6F6C;
        }
        .error{
            color: #EF6F6C;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create Free Premier Agent </h3>
                    <a class="btn btn-success pull-right" href="{{url('users')}}"><i class="icon-arrow-left-circle"></i> Agents List</a>
                    <div class="clearfix"></div>
                    <!-- <form id="commentForm" action="{{url('user/create')}}"method="POST" enctype="multipart/form-data" > -->
                    <form id="agent_register" class="form-horizontal" action="{{ route('free_agent_register') }}" method="post" enctype="multipart/form-data">

                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div id="rootwizardd">
                            <ul class="nav nav-tabs">
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                        <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                        <div class="col-sm-10">
                                            <input id="first_name" name="first_name" type="text"placeholder="First Name" class="form-control required"value="{!! old('first_name') !!}"/>
                                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                                        <label for="last_name" class="col-sm-2 control-label">Last Name </label>
                                        <div class="col-sm-10">
                                            <input id="last_name" name="last_name" type="text"placeholder="Last Name" class="form-control "value="{!! old('last_name') !!}"/>
                                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    

                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                   class="form-control required email" value="{!! old('email') !!}"/>
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control required" value="{!! old('password') !!}"/>
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('confirm_password', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="confirm_password" name="confirm_password"
                                                   type="password"
                                                   placeholder="Confirm Password " class="form-control required"/>
                                            {!! $errors->first('confirm_password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <!-- <input id="address" name="address" type="text" class="form-control"value="{{ old('address') }}"/> -->
                                            <input type="text"  name="autocomplete" id="autocomplete" value="{{ old('address') }}" class="form-control username-field signup-field blake-input" placeholder="Select Location" >
                                            <input type="hidden" name="latitude" id="latitude" class="form-control">
                                            <input type="hidden" name="longitude" id="longitude" class="form-control">
                                            <input type="hidden" name="state" id="state" class="form-control">

                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('brokerage_name', 'has-error') }}">
                                        <label for="brokerage_name" class="col-sm-2 control-label">Brokerage Name</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_name" name="brokerage_name" type="text"placeholder="Brokerage Name" class="form-control "value="{!! old('brokerage_name') !!}"/>
                                            {!! $errors->first('brokerage_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('office_phone', 'has-error') }}">
                                        <label for="office_phone" class="col-sm-2 control-label">Office Phone </label>
                                        <div class="col-sm-10">
                                            <input id="office_phone" name="office_phone" type="text"placeholder="Office Phone" class="form-control "value="{!! old('office_phone') !!}"/>
                                            {!! $errors->first('office_phone', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('mobile_phone', 'has-error') }}">
                                        <label for="mobile_phone" class="col-sm-2 control-label">Mobile Phone </label>
                                        <div class="col-sm-10">
                                            <input id="mobile_phone" name="mobile_phone" type="text"placeholder="Mobile Phone" class="form-control "value="{!! old('mobile_phone') !!}"/>
                                            {!! $errors->first('mobile_phone', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                     <div class="form-group {{ $errors->first('license_state', 'has-error') }}">
                                        <label for="license_state" class="col-sm-2 control-label">License State </label>
                                        <div class="col-sm-10">
                                            <input id="license_state" name="license_state" type="text"placeholder="License State" class="form-control "value="{!! old('license_state') !!}"/>
                                            {!! $errors->first('license_state', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                                        <label for="license_number" class="col-sm-2 control-label">License Number </label>
                                        <div class="col-sm-10">
                                            <input id="license_number" name="license_number" type="text"placeholder="License Number" class="form-control "value="{!! old('license_number') !!}"/>
                                            {!! $errors->first('license_number', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('file', 'has-error') }}">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;">
                                                    <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="profile pic">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="pic" name="file" type="file" class="form-control " accept="image/*" />
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block">{{ $errors->first('file', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pager wizard">
                                    <button type="submit" class="btn" style="background: #ec1c24 !important;float: right;color: white" >Save</button>
                                </ul>
                            </div>
                        </div>
                    </form>


                    @if(count($errors) > 0)
                        <div class="alert alert-danger">Errors! Please fill form with proper details</div>
                    @endif

                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
    {{--<script src="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>--}}
    <script src="{{asset('plugins/components/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"
            type="text/javascript"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{ asset('/js/adduser.js') }}"></script>

    <script>
        @if(\Session::has('message'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('message')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @endif
    </script>
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
                 $("#lat_area").removeClass("d-none");
                 $("#long_area").removeClass("d-none");
             });
         }
      </script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        {{--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
        <script type="text/javascript">
            $(document).ready(function() {
                $( "#agent_register" ).validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 5,
                        },
                        confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                    },
                    submitHandler: function(form,e) {
                        e.preventDefault();
                        var frm = $('#agent_register');
                        var formData = new FormData(frm[0]);
                        formData.append('file', $('input[type=file]')[0].files[0]);
                        $.ajax({
                            type: "POST",
                            url: "{{ url('free_agent_register') }}",
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: formData,
                            success: function(result){
                                if(result.msg=='success'){
                                    swal({
                                        title: 'Done',
                                        text: 'Free Agent Registration Successful. Package Expiry Date is '+result.trial_expiry_date,
                                        icon: 'success',
                                        timer: 5000,
                                        buttons: false,
                                    }).then(() => {
                                        window.location.href = "/users";
                                        // window.location.href = "/";
                                    })
                                }else{
                                    showSwal('OOPS','Email Already Taken, Try agin.','error');
                                }
                            },
                            error : function(error) {
                                showSwal('OOPS','Invalid Email Address or Password, Try agin.','error');
                            }
                        });
                        return false;
                        // }
                    }
                });
            });

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
@endpush