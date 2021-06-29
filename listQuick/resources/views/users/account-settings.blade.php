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
            color: red;
        }
        /*li.next a:before {content: 'Make sure your info is correct and click Next';position: absolute;background: #f7f7f7;width: 247px;padding: 10px 10px;text-align: left;top: 51px;left: -230%;z-index: 99999;border: 1px solid #b4b4b4;}*/
        .pager .next>a { position: relative;}
        .next_before_div {
            background: #f7f7f7;
            width: 247px;
            padding: 10px 10px;
            text-align: left;
            top: 50px;
            z-index: 99999;
            border: 1px solid #b4b4b4;
            right: -50px;
            position: absolute;
        }

        .next_before_div:before {
            content: " ";
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #ededed;
            position: absolute;
            top: -17%;
            left: 63%;
            transform: rotate( 180deg);
        }

    </style>


@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Account Settings</h3>
                    <div class="clearfix"></div>
                    <form id="commentForm" action="{{url('account-settings')}}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div id="rootwizard">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                <li><a href="#tab4" data-toggle="tab">Professional Details</a></li>
                                <li><a href="#tab3" data-toggle="tab">Address</a></li>
                                <li><a href="#tab9" data-toggle="tab">Stats</a></li>
                                 <li><a href="#tab5" data-toggle="tab">Social Media Links</a></li>
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
                                                <input id="name" name="name" type="text"
                                                       placeholder="Name" class="form-control required"
                                                       value="{{$user->name}}" maxlength="40"/>

                                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                   class="form-control required email" value="{{$user->email}}" maxlength="40"/>
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <h6><b>If you don't want to change your password, leave these boxes empty.</b></h6>

                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control required" value="{!! old('password') !!}" maxlength="40"/>
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password_confirmation', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirmation" name="password_confirmation"
                                                   type="password"
                                                   placeholder="Confirm Password " class="form-control required" maxlength="40"/>
                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Gender *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender" required>
                                                {{--<option value="">Select</option>--}}
                                                <option value="male"
                                                        @if($user->profile->gender === 'male') selected="selected" @endif >Male
                                                </option>
                                                <option value="female"
                                                        @if($user->profile->gender === 'female') selected="selected" @endif >
                                                    Female
                                                </option>
                                                <option value="other"
                                                        @if($user->profile->gender === 'other') selected="selected" @endif >Other
                                                </option>

                                            </select>
                                            <span class="help-block">{{ $errors->first('gender', ':message') }}</span>
                                        </div>

                                    </div>
                                    <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input autocomplete="off" value="{{$user->profile->dob ?: null}}" id="dob" name="dob" type="text"  class="form-control" data-date-format="M-d-yy"
                                                   placeholder="M-d-yy"/>
                                            <span class="help-block">{{ $errors->first('dob', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;" id="profile_image">
                                                    @if($user->profile->pic != null)
                                                        <img src="{{asset('storage/uploads/users/'.$user->profile->pic)}}" alt="profile pic">
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
                        <textarea name="bio" id="bio" class="form-control resize_vertical"
                                  rows="4">{{$user->profile->bio}}</textarea>
                                        </div>
                                        {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">


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
                                    @if(!auth()->user()->hasRole('user'))
                                        <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                            <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                            @for($i=1;$i<=10;$i++)
                                                <div class="col-sm-2">
                                                    <input id="zip{{$i}}" name="zip{{$i}}" type="text" class="form-control"
                                                           value="{{ $user->profile->{'zip'.$i} }}"  type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                    <span class="help-block">{{ $errors->first('zip'.$i, ':message') }}</span>
                                                </div>
                                                @if($i==5)
                                                    <div class="col-sm-2"></div>
                                                    @endif
                                            @endfor
                                        </div>
                                    @else
                                        @for($i=1;$i<=10;$i++)
                                                <input id="zip{{$i}}" name="zip{{$i}}" type="hidden" class="form-control" value="{{ $user->profile->{'zip'.$i} }}"/>
                                        @endfor
                                    @endif
                                </div>
                                <div class="tab-pane" id="tab4" disabled="disabled">
                                    <div class="form-group {{ $errors->first('brokerage_name', 'has-error') }}">
                                        <label for="brokerage_name" class="col-sm-2 control-label">Brokerage</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_name" name="brokerage_name" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->brokerage_name}}"/>
                                            <span class="help-block">{{ $errors->first('brokerage_name', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('office_phone', 'has-error') }}">
                                        <label for="office_phone" class="col-sm-2 control-label">Office Phone</label>
                                        <div class="col-sm-10">
                                            <input id="office_phone" name="office_phone" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->office_phone}}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                            <span class="help-block">{{ $errors->first('office_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('mobile_phone', 'has-error') }}">
                                        <label for="mobile_phone" class="col-sm-2 control-label">Mobile Phone</label>
                                        <div class="col-sm-10">
                                            <input id="mobile_phone" name="mobile_phone" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->mobile_phone}}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                            <span class="help-block">{{ $errors->first('mobile_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_state', 'has-error') }}">
                                        <label for="license_state" class="col-sm-2 control-label">License State</label>
                                        <div class="col-sm-10">
                                            <input id="license_state" name="license_state" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->license_state}}"/>
                                            <span class="help-block">{{ $errors->first('license_state', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                                        <label for="license_number" class="col-sm-2 control-label">License Number</label>
                                        <div class="col-sm-10">
                                            <input id="license_number" name="license_number" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->license_number}}"/>
                                            <span class="help-block">{{ $errors->first('license_number', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('work_with_buyers', 'has-error') }}">
                                        <label for="work_with_buyers" class="col-sm-2 control-label">Work with Buyers</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Work with Buyers" name="work_with_buyers">
                                                <option value="yes"
                                                        @if($user->profile->work_with_buyers == 'yes') selected="selected" @endif >Yes
                                                </option>
                                                <option value="no"
                                                        @if($user->profile->work_with_buyers== 'no') selected="selected" @endif >
                                                    No
                                                </option>
                                            </select>
                                            <span class="help-block">{{ $errors->first('work_with_buyers', ':message') }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab9" disabled="disabled">
                                    <div class="form-group {{ $errors->first('brokerage_name', 'has-error') }}">
                                        <label for="area_sales" class="col-sm-2 control-label">Number of
                                            Transactions Last Year.</label>
                                        <div class="col-sm-10">
                                            <input id="area_sales" name="area_sales" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->area_sales??''}}" />
                                            <span class="help-block">{{ $errors->first('area_sales', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('out_area_sales', 'has-error') }}">
                                        <label for="out_area_sales" class="col-sm-2 control-label">Years in Marketplace.</label>
                                        <div class="col-sm-10">
                                            <input id="out_area_sales" name="out_area_sales" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->out_area_sales??''}}"/>
                                            <span class="help-block">{{ $errors->first('out_area_sales', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('condo', 'has-error') }}">
                                        <label for="condo" class="col-sm-2 control-label">Average Days on
                                            Market.</label>
                                        <div class="col-sm-10">
                                            <input id="condo" name="condo" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->condo??''}}" />
                                            <span class="help-block">{{ $errors->first('condo', ':message') }}</span>
                                        </div>
                                    </div>

                                </div>


                                     <div class="tab-pane" id="tab5" disabled="disabled">
                                    <div class="form-group {{ $errors->first('brokerage_name', 'has-error') }}">
                                        <label for="brokerage_name" class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input id="facebook" name="facebook" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->facebook??''}}"/>
                                            <span class="help-block">{{ $errors->first('brokerage_name', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('office_phone', 'has-error') }}">
                                        <label for="office_phone" class="col-sm-2 control-label">Website</label>
                                        <div class="col-sm-10">
                                            <input id="dwitter" name="twitter" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->twitter??''}}"/>
                                            <span class="help-block">{{ $errors->first('office_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('mobile_phone', 'has-error') }}">
                                        <label for="mobile_phone" class="col-sm-2 control-label">Linkedin</label>
                                        <div class="col-sm-10">
                                            <input id="dribbble" name="dribbble" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->dribbble??''}}"/>
                                            <span class="help-block">{{ $errors->first('mobile_phone', ':message') }}</span>
                                        </div>
                                    </div>

                                </div>


                                <ul class="pager wizard">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    {{--<li class="next"><a href="#" class="next_account_setting" data-container="body" title="" data-toggle="popover" data-placement="top" data-html="true"  data-original-title="Make sure your info is correct and click <b>Next</b>">Next</a></li>--}}
                                    <li class="next">
                                        <a href="#" class="next_account_setting">Next
                                            @if($user->next_disabled==0)
                                                <div class="next_before_div" style="background-color: #34343a;color: #ffffff">
                                                    Make sure your info is correct and click Next
                                                </div>
                                            @endif
                                        </a>
                                    </li>
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

    <script>
        $(function(){
            $("#profile_image").resizable();
        });
    </script>

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
            dateFormat: 'M-d-yy',
            SetDate:"{{$user->profile->dob}}",
            widgetPositioning:{
                vertical:'bottom'
            },

            keepOpen:false,
            useCurrent: false,
            maxDate: moment().add(1,'h').toDate()
        });
/*       jQuery(window).load(function () {
            $('.next_account_setting').popover('show');
            $('.popover-content').remove();
        });*/

{{--        @if($user->next_disabled==0)
            $('.next_account_setting').click(function(e){
                $('.next_before_div').hide();
            });
        @endif--}}
    </script>
@endpush