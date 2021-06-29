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

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .nav-pills>li>a{
            cursor: default;;
            background-color: inherit;
        }
        .nav-pills>li>a:focus,.nav-tabs>li>a:focus, .nav-pills>li>a:hover, .nav-tabs>li>a:hover {
            border: 1px solid transparent!important;
            background-color: inherit!important;
        }
        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }
        .error-block{
            background-color: #ff9d9d;
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Premier Agent</h3>
                    <div class="clearfix"></div>
                    <form id="commentForm" action="{{url('user/edit/'.$user->id)}}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div id="rootwizard">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                <li><a href="#tab5" data-toggle="tab">Professional Details</a></li>
                                <li><a href="#tab3" data-toggle="tab">Address</a></li>
                                <li><a href="#tab8" data-toggle="tab">Agent Sales</a></li>
                                <li><a href="#tab4" data-toggle="tab">User Role</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>

                                    @if($user->name=='User')
                                        <input id="name" name="name" type="hidden" placeholder="Name" class="form-control required"value="{{$user->name}}"/>
                                    @else
                                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                            <label for="name" class="col-sm-2 control-label">Name *</label>
                                            <div class="col-sm-10">
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control required"value="{{$user->name}}"/>
                                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                   class="form-control required email" value="{{$user->email}}"/>
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <h6><b>If you don't want to change password... please leave them empty</b></h6>

                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control required" value="{!! old('password') !!}"/>
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password_confirmation', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirmation" name="password_confirmation"
                                                   type="password"
                                                   placeholder="Confirm Password " class="form-control required"/>
                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input autocomplete="off" value="{{$user->profile->dob??'' }}" id="dob" name="dob" type="text"  class="form-control"
                                                   data-date-format="YYYY-MM-DD"
                                                   placeholder="yyyy-mm-dd"/>
                                            <span class="help-block">{{ $errors->first('dob', ':message') }}</span>

                                        </div>
                                    </div>


                                    <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;">
                                                    @if(isset($user->profile->pic) && $user->profile->pic != null)
                                                        <img src="{{asset('storage/uploads/users/'.$user->profile->pic??'')}}" alt="profile pic">
                                                    @else
                                                        <img src="http://placehold.it/200x200" alt="profile pic">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block">{{ $errors->first('pic_file', ':message') }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio
                                            <small>(brief intro) *</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control resize_vertical" rows="4">{{$user->profile->bio??''}}</textarea>
                                        </div>
                                        {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">
                                    <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Gender *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male"
                                                        @if(isset($user->profile->gender) && $user->profile->gender === 'male') selected="selected" @endif >Male
                                                </option>
                                                <option value="female"
                                                        @if(isset($user->profile->gender) && $user->profile->gender === 'female') selected="selected" @endif >
                                                    Female
                                                </option>
                                                <option value="other"
                                                        @if(isset($user->profile->gender) && $user->profile->gender === 'other') selected="selected" @endif >Other
                                                </option>

                                            </select>
                                            <span class="help-block">{{ $errors->first('gender', ':message') }}</span>
                                        </div>

                                    </div>

                                    <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                        <label for="country" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            <input id="countries" name="country" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->country??''}}"/>
                                            <span class="help-block">{{ $errors->first('country', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->state??''}}"/>
                                            <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                        <label for="city" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" type="text" class="form-control"
                                                   value="{{$user->profile->city??''}}"/>
                                            <span class="help-block">{{ $errors->first('city', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control"
                                                   value="{{$user->profile->address??''}}"/>
                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('lat', 'has-error') }}">
                                        <label for="lat" class="col-sm-2 control-label">Latitude</label>
                                        <div class="col-sm-10">
                                            <input id="lat" name="lat" type="text" class="form-control"
                                                   value="{{$user->profile->lat??''}}"/>
                                            <span class="help-block">{{ $errors->first('lat', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('lng', 'has-error') }}">
                                        <label for="lng" class="col-sm-2 control-label">Longitude</label>
                                        <div class="col-sm-10">
                                            <input id="lng" name="lng" type="text" class="form-control"
                                                   value="{{$user->profile->lng??''}}"/>
                                            <span class="help-block">{{ $errors->first('lng', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control"
                                                   value="{{$user->profile->address??''}}"/>
                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                        </div>
                                    </div>
                                    

                                    <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                        <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                        <div class="col-sm-10">
                                            <input id="postal" name="postal" type="text" class="form-control"
                                                   value="{{$user->profile->postal??''}}"/>
                                            <span class="help-block">{{ $errors->first('postal', ':message') }}</span>

                                        </div>
                                    </div>
                                </div>
                                  <div class="tab-pane" id="tab8" disabled="disabled">
                                    

                                     <div class="form-group {{ $errors->first('lng', 'has-error') }}">
                                        <label for="lng" class="col-sm-2 control-label">Area Sales</label>
                                        <div class="col-sm-10">
                                            <input id="area_sales" name="area_sales" type="text" class="form-control"
                                                   value="{{$user->profile->area_sales??''}}"/>
                                            <span class="help-block">{{ $errors->first('area_sales', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('lng', 'has-error') }}">
                                        <label for="lng" class="col-sm-2 control-label">Out Of Area Sales</label>
                                        <div class="col-sm-10">
                                            <input id="out_area_sales" name="out_area_sales" type="text" class="form-control"
                                                   value="{{$user->profile->out_area_sales??''}}"/>
                                            <span class="help-block">{{ $errors->first('out_area_sales', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('earning', 'has-error') }}">
                                        <label for="lng" class="col-sm-2 control-label">Total Earnings</label>
                                        <div class="col-sm-10">
                                            <input id="earning" name="earning" type="number" class="form-control"
                                                   value="{{$user->profile->earning??''}}"/>
                                            <span class="help-block">{{ $errors->first('earning', ':message') }}</span>

                                        </div>
                                    </div>

                                    {{--<div class="form-group">--}}
                                    {{--<label for="activate" class="col-sm-2 control-label"> Activate User *</label>--}}
                                    {{--<div class="col-sm-10">--}}
                                    {{--<input id="activate" name="activate" type="checkbox"--}}
                                    {{--class="pos-rel p-l-30 custom-checkbox"--}}
                                    {{--value="1" @if(old('activate')) checked="checked" @endif >--}}
                                    {{--<span>To activate user account automatically, click the check box</span></div>--}}

                                    {{--</div>--}}
                                </div>
                                <div class="tab-pane" id="tab4" disabled="disabled">
                                    <p class="text-danger"><strong>Be careful with role selection, if you give admin
                                            access.. they can access admin section</strong></p>

                                    <div class="form-group required {{ $errors->first('role', 'has-error') }}">
                                        <label for="group" class="col-sm-2 control-label">Role *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control required" title="Select role..." name="role"
                                                    id="role" readonly>
                                                <option value="">Select</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" readonly @if(in_array($role->id,$user->roles()->pluck('id')->toArray())) selected="selected" @endif >{{ $role->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block">{{ $errors->first('role', ':message') }}</span>
                                        </div>
                                    </div>
                                    {{--<div class="form-group">--}}
                                    {{--<label for="activate" class="col-sm-2 control-label"> Activate User *</label>--}}
                                    {{--<div class="col-sm-10">--}}
                                    {{--<input id="activate" name="activate" type="checkbox"--}}
                                    {{--class="pos-rel p-l-30 custom-checkbox"--}}
                                    {{--value="1" @if(old('activate')) checked="checked" @endif >--}}
                                    {{--<span>To activate user account automatically, click the check box</span></div>--}}

                                    {{--</div>--}}
                                </div>
                                <div class="tab-pane" id="tab5" disabled="disabled">
                                    <div class="form-group {{ $errors->first('brokerage_name', 'has-error') }}">
                                        <label for="brokerage_name" class="col-sm-2 control-label">Brokerage</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_name" name="brokerage_name" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->brokerage_name??''}}"/>
                                            <span class="help-block">{{ $errors->first('brokerage_name', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('office_phone', 'has-error') }}">
                                        <label for="office_phone" class="col-sm-2 control-label">Office Phone</label>
                                        <div class="col-sm-10">
                                            <input id="office_phone" name="office_phone" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->office_phone??''}}"/>
                                            <span class="help-block">{{ $errors->first('office_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('mobile_phone', 'has-error') }}">
                                        <label for="mobile_phone" class="col-sm-2 control-label">Mobile Phone</label>
                                        <div class="col-sm-10">
                                            <input id="mobile_phone" name="mobile_phone" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->mobile_phone??''}}"/>
                                            <span class="help-block">{{ $errors->first('mobile_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_state', 'has-error') }}">
                                        <label for="license_state" class="col-sm-2 control-label">License State</label>
                                        <div class="col-sm-10">
                                            <input id="license_state" name="license_state" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->license_state??''}}"/>
                                            <span class="help-block">{{ $errors->first('license_state', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                                        <label for="license_number" class="col-sm-2 control-label">License Number</label>
                                        <div class="col-sm-10">
                                            <input id="license_number" name="license_number" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->license_number??''}}"/>
                                            <span class="help-block">{{ $errors->first('license_number', ':message') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <ul class="pager wizard">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                    <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
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
    <script src="{{ asset('js/edituser.js') }}"></script>

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
    <script>
        $("#dob").datepicker({
            dateFormat: 'yy-m-d',
            SetDate:"{{$user->profile->dob??''}}",
            widgetPositioning:{
                vertical:'bottom'
            },
            keepOpen:false,
            useCurrent: false,
            maxDate: moment().add(1,'h').toDate()
        });
        $('#lat').keypress(function(event) {
          if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
          }
        });
        $('#lng').keypress(function(event) {
          if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
          }
        });
    </script>
@endpush