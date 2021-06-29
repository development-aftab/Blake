@extends('layouts.master')

@section('content')
    <style>
        tr.before_gray_listing th, tr.before_gray_listing td { padding-bottom: 50px !important;}
        tr.gray_listing { background: #8080804a;}
        tr.gray_listing th, tr.gray_listing td { font-weight: 800; color: black;}

        .modal-body .header {
            text-align: center;
            background: #d4d4d44f;
            padding: 40px 35px;
        }

        .modal-body .header h1 {
            font-size: 45px;
            font-weight: 600;
        }

        .modal-body .header h2 {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.4;
        }

        .modal-body .header button {
            padding: 10px 25px;
            border: 0;
            box-shadow: 0px 3px 6px black;
            background: transparent;
            border-radius: 5px;
            color: black;
            font-weight: 600;
            margin-top: 20px;
        }

        .modal-body {
            padding: 0;
        }

        .modal-header {
            background: #d4d4d44f;
            border: 0;
        }

        .modal-body form {
            padding: 30px 20px;
        }

        .modal-body form label {
            font-size: 17px;
            font-weight: 600;
            color: black;
            padding-bottom: 5px;
        }

        .modal-body form input {
            height: 50px;
        }

        .modal-body form input::placeholder {
            font-size: 18px;
        }

        .modal-body form .form-row .col-md-2 select {
            width: 100%;
            height: 50px;
            border: 1px solid #e5ebec;
            font-size: 30px;
        }

        .modal-body form .form-row .col-md-2 {
            padding: 0;
        }

        .modal-footer button.btn {
            padding: 10px 84px;
            font-size: 20px;
            border-radius: 30px;
            background: grey;
            color: white;
        }

        .modal-footer {
            text-align: center;
        }

        @media screen and (max-width:1024px){
            .modal-body .header h2 {
                font-size: 17px;
                font-weight: 700;
                line-height: 1.4;
            }
            .modal-footer button.btn {
                margin-bottom: 20px;
                padding: 10px 70px;
            }

        }
        @media screen and (max-width:768px){
            .modal-body .header h1 {
                font-size: 30px;
            }
            .modal-body .header h2 {
                font-size: 14px;
            }
            .modal-footer button.btn {
                padding: 10px 35px;
            }

        }

        @media screen and (max-width:480px){
            .modal-dialog {
                max-width: 100% !important;
            }
            .header{padding: 0px 15px 20px;}
            .modal-body form label {
                font-size: 15px;
            }
            .modal-footer button.btn{padding: 10px 30px; margin-bottom: 0px;}

        }
    </style>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><b style="font-weight: bolder">@if(ucfirst($referal->status)=='Closed') Completed @else {{ ucfirst($referal->status) }} @endif </b> Referral
                        @if($referal->status=='accepted')
                            <button class="btn btn-sm btn-info completed_referral_button" style="border-radius: 30px;font-weight: bold">Complete Referral</button>
                        @endif
                        @if($referal->status=='closed')
                            <button class="btn btn-sm btn-info completed_referral_button" style="border-radius: 30px;font-weight: bold">View Details</button>
                        @endif
                    </h3>
                    @can('view-'.str_slug('Referal'))
                        <a class="btn btn-success pull-right" href="{{ url('/referal/referal') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                                <tr>
                                    <th> Referred By </th>
                                    <td> {{ $referal->getReferalByDetails->name??"Not Available" }} </td>
                                </tr>
                                <tr>
                                    <th> Referred To </th>
                                    <td> {{ $referal->getReferalToDetails->name??"Not Available" }} </td>
                                </tr>
                                <tr>
                                    <th> Referring Client </th>
                                    <td> {{ ucfirst($referal->referal_client) }} </td>
                                </tr>
                                <tr>
                                    <th> Approx Price Point </th>
                                    <td> {{ $referal->price }} </td>
                                </tr>
                                <tr>
                                    <th> Time Frame </th>
                                    <td> {{ $referal->time }} </td>
                                </tr>
                                <tr>
                                    <th> Referral Fee  </th>
                                    <td> {{ $referal->fee }}% </td>
                                </tr>
                                <tr class="before_gray_listing">
                                    <th> Note </th>
                                    <td> {{ $referal->note }} </td>
                                </tr>

                               @if($referal->status=='accepted' || $referal->status=='closed' )
                                    <tr class="gray_listing">
                                        <th> Client Name </th>
                                        <td> {{ $referal->client_name }} </td>
                                    </tr>
                                    <tr class="gray_listing">
                                        <th> Client Phone Number  </th>
                                        <td> {{ $referal->client_phone }} </td>
                                    </tr>
                                    <tr class="gray_listing">
                                        <th> Client Email </th>
                                        <td> {{ $referal->client_email }} </td>
                                    </tr>
                               @endif

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @if($referal->status=='pending')
                        <div class="row">
                            <div class="col-sm-11"></div>
                            <div class="col-sm-1">
                                <a href="{{ route('change_referral_status',[$referal->id,'accepted'])}}" onclick="return confirm('Are you sure?')" >
                                    <button class="btn btn-xs btn-danger" style="border-radius: 15px;padding: 5px 25px">Accept</button>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-11"></div>
                            <div class="col-sm-1">
                                <a href="{{ route('change_referral_status',[$referal->id,'rejected'])  }}" onclick="return confirm('Are you sure?')" >
                                    <button class="btn btn-xs btn-default" style="border-radius: 15px;padding: 5px 25px">Reject &nbsp;</button>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="completed_referral_modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document" style="max-width: 30%;margin: 0 auto" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1"></h4></div>
                <div class="modal-body">
                    <div class="header">

                        <i class="fa fa-check fa-4x" style="color: #00bbd9"></i>
                        <h1>Is this still correct?</h1>
                        <h2>Confirm the closing details and we'll share this with the referring agent.</h2>
                        {{--<button>{{ $referal->getReferalByDetails->name??"Not Available" }} </button>--}}
                    </div>
                    <form action="{{route('complete_referral_process')}}" method="POST">
                        @csrf()
                        <input type="hidden" name="id" value="{{ $referal->id??"Not Available" }}" >
                        <div class="form-group">
                            <label for="" class="control-label">Closing date*</label>
                            <input type="date" class="form-control" id="closing_date" required name="closing_date" @if($referal->status=='closed') value="{{ $referal->closing_date }}" readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Closing price*</label>
                            <input type="number" class="form-control" id="closing_price" required name="closing_price" placeholder="$" @if($referal->status=='closed') value="{{ $referal->closing_price }}" readonly @endif>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Property address*</label>
                            <input type="text" class="form-control" id="closing_property_address" required name="closing_property_address" placeholder="Enter Address" @if($referal->status=='closed') value="{{ $referal->closing_property_address }}" readonly @endif>
                        </div>
                        <label>How much commission is the client paying?*</label>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <select id="referral_commission_type" required name="referral_commission_type" style="padding: 0px 18px; @if($referal->status=='closed')  background-color: #e5ebec !important @endif" @if($referal->status=='closed') disabled @endif>
                                    <option value="%" @if($referal->status=='closed' && $referal->referral_commission_type=='%') selected disabled @endif >%</option>
                                    <option value="$" @if($referal->status=='closed' && $referal->referral_commission_type=='$') selected disabled @endif >$</option>
                                </select>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="number" class="form-control" id="commission" required name="commission" placeholder="Enter Value" @if($referal->status=='closed') value="{{ $referal->commission }}" readonly @endif>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{--<button type="button" class="btn btn-danger" data-dismiss="modal" style="background: #ec1c24 !important">Close</button>--}}
                            @if($referal->status!='closed')
                                <button type="submit" class="btn" style="background-color: #00bbd9">Complete</button>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="{{asset('plugins/components/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('plugins/components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <script>
        $(document).on('click','.completed_referral_button',function(e){
            $('#completed_referral_modal').modal('show');
        });
    </script>

@endpush

