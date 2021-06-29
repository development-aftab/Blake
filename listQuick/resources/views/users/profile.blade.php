@extends('layouts.master')
@push('css')
@endpush

@section('content')
<div class="container-fluid">
    <!-- /.row -->
    <!-- .row -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> 
                    <!-- <img width="100%" alt="user" src="{{asset('plugins/images/large/img1.jpg')}}"> -->
                    <div class="overlay-box">
                        <a href="{{ redirect()->getUrlGenerator()->previous() }}"><span class="badge badge-info" style="float: left;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</span></a> 
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                @if($user->profile->pic)
                                    <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" class="thumb-lg img-circle" alt="img">
                                @else
                                    <img src="{{asset('plugins/images/users/1.jpg')}}" class="thumb-lg img-circle" alt="img">
                                @endif
                            </a>
                            <h4 class="text-white">{{$user->name??"Not Available"}}</h4>
                            <h5 class="text-white">{{$user->email??"Not Available"}}</h5> </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-purple"><i class="ti-facebook"></i></p>
                        <!-- <h1>258</h1>  -->
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-blue"><i class="ti-twitter"></i></p>
                        <!-- <h1>125</h1>  -->
                        </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <p class="text-danger"><i class="ti-dribbble"></i></p>
                        <!-- <h1>556</h1>  -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab">
                        <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Profile</span> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{$user->name??"Not Available"}}</p>
                            </div>

                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">{{ $user->phone??'Not Available' }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$user->email??"Not Available"}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Country</strong>
                                <br>
                                <p class="text-muted">{{$user->country??"Not Available"}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Gender</strong>
                                <br>
                                <p class="text-muted">{{$user->profile->state??"Not Available"}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>State</strong>
                                <br>
                                <p class="text-muted">{{$user->profile->state??"Not Available"}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>City</strong>
                                <br>
                                <p class="text-muted">{{$user->profile->city??"Not Available"}}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Zip</strong>
                                <br>
                                <p class="text-muted">{{$user->profile->zip??"Not Available"}}</p>
                            </div>
                            
                        </div>
                        <hr>
                        <h4 class="font-bold m-t-30">Address</h4>
                        <p class="m-t-30">{{ $user->profile->address??"Not Available" }}</p>
                        
                        <!-- <h4 class="font-bold m-t-30">Skill Set</h4>
                        <hr>
                        <h5>Wordpress <span class="pull-right">80%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5>HTML 5 <span class="pull-right">90%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5>jQuery <span class="pull-right">50%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h5>Photoshop <span class="pull-right">70%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                        </div> -->
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @include('layouts.partials.right-sidebar')
</div>
@endsection

@push('js')
@endpush