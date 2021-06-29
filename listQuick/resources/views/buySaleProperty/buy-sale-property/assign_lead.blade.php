@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <!-- <h3 class="box-title pull-left">Buysaleproperty</h3> -->
                    <h3 class="box-title pull-left">@if(Session::get('request_type') == "sale")Assign Seller  @else Assign Buyer  @endif  Leads</h3>
                    @can('add-'.str_slug('BuySaleProperty'))
                        <a class="btn btn-success pull-right" href="{{ url('/buySaleProperty/buy-sale-property/create') }}"><i
                                    class="icon-plus"></i> Add Buy Sale Property</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table" id="leadsTable">
                                    <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Requester Name</th>
                                        <th>Requester Phone</th>
                                        <th>Worth</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="buy_sale_property_id" id="buy_sale_property_id">
                                                    <option disabled>Select Lead to Assign</option>
                                                    @foreach($buySaleProperties as $buySaleProperty)
                                                        <option value="{{$buySaleProperty->id}}" @if($leadId==$buySaleProperty->id) selected @endif >{!! $buySaleProperty->location !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> {{ $selectedLead->requester_name??"Not Available" }} </td>
                                            <td> {{ $selectedLead->requester_phone??"Not Available" }} </td>
                                            <td> {{ $selectedLead->getWorthDetail->price??"Not Available" }} </td>
                                            <td> {{ $selectedLead->created_at->format('M-d-Y')??"Not Available" }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            <button class="btn btn-sm btn-success assign_lead_to_agent">Assign Lead</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>
                                    <div class="checkbox checkbox-danger" style="display: inline !important;">
                                        <input id="check_all_agents" type="checkbox">
                                        <label for="check_all_agents"></label>
                                    </div>
                                </th>
                                <th>Agent Name</th>
                                <th>Agent Email</th>
                                <th>Agent Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($agents as $agent)
                                    <?php
                                        $checked = '';
                                        if(isset($assignedLeadsAgents) && in_array($agent->id,$assignedLeadsAgents)){
                                            $checked = 'checked';
                                        }//endif  checked @endif
                                    ?>
                                    <tr>
                                        <th>
                                            <div class="checkbox checkbox-danger">
                                                <input id="checked_agents{{$agent->id}}" class="checked_agents" name="checked_agents" type="checkbox" value="{{ $agent->id  }}" {{$checked}}>
                                                <label for="checked_agents{{$agent->id}}"></label>
                                            </div>
                                        </th>
                                        <td>{{ $agent->name??"Not Available" }}</td>
                                        <td>{{ $agent->email??"Not Available" }}</td>
                                        <td>{{ $agent->profile->mobile_phone??"Not Available"}}</td>
                                        <td>
                                            @if($checked)
                                                <button class="btn btn-sm btn-danger individual_lead_process" type='remove' agent_id="{{$agent->id}}" agent_name="{{$agent->name}}" lead_id="{{ $leadId }}">Remove Lead</button>
                                            @else
                                                <button class="btn btn-sm btn-info individual_lead_process" type='assign' agent_id="{{$agent->id}}" agent_name="{{$agent->name}}" lead_id="{{ $leadId }}">Assign Lead</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $agents->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-1">
                            <button class="btn btn-sm btn-success assign_lead_to_agent">Assign Lead</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

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
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
        $("#check_all_agents").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('.assign_lead_to_agent').on('click',function(e){
            e.preventDefault();
            var agent_ids = [];
            var buy_sale_property_id = $("#buy_sale_property_id option").filter(":selected").val();
            $("input:checkbox[name=checked_agents]:checked").each(function(){
                agent_ids.push($(this).val());
            });
            swal({
                title: "Are you sure?",
                text: "This action cannot be undone. Are you sure you want to perform this action?",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('assign_lead_process')}}",
                        data:{
                            '_token':"{{csrf_token()}}",
                            agent_ids: JSON.stringify(agent_ids),
                            buy_sale_property_id:buy_sale_property_id,
                        },
                        dataType : 'json',
                        success: function( data ) {
                            console.log(data);
                        },error:function(e){
                        }
                    });

                    swal({
                        title: 'Done!',
                        text: 'Lead Assigned to selected agents!',
                        icon: 'success',
                        buttons: false,
                        timer: 4000,
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Cancelled',
                        text: 'Lead assignment process canceled!',
                        icon: 'error',
                        buttons: false,
                        timer: 4000,
                    });
                }
            })
        });
        $('.individual_lead_process').on('click',function(e){
            e.preventDefault();
            var agent_id = $(this).attr('agent_id');
            var agent_name = $(this).attr('agent_name');
            var buy_sale_property_id = $(this).attr('lead_id');
            var type = $(this).attr('type');
            swal({
                title: "Are you sure?",
                text: "This action cannot be undone. Are you sure you want to perform this action?",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('individual_assign_lead_process')}}",
                        data:{
                            '_token':"{{csrf_token()}}",
                            agent_id: agent_id,
                            buy_sale_property_id:buy_sale_property_id,
                            type:type,
                        },
                        dataType : 'json',
                        success: function( data ) {
                            console.log(data);
                        },error:function(e){
                        }
                    });
                    var text = 'Lead Assigned to '+agent_name+' successfully.';
                    if(type=='remove'){
                        text = agent_name+' Lead Removed successfully.'
                    }
                    swal({
                        title: 'Done!',
                        text: text,
                        icon: 'success',
                        buttons: false,
                        timer: 4000,
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    swal({
                        title: 'Cancelled',
                        text: 'Lead assignment process canceled!',
                        icon: 'error',
                        buttons: false,
                        timer: 4000,
                    });
                }
            })
        });

        $('#buy_sale_property_id').change(function(e){
            e.preventDefault;
            window.location = "{{route('assign_lead')}}/"+$(this).val();
        });
    </script>
    @include('includes.common_search_datatable')
@endpush
