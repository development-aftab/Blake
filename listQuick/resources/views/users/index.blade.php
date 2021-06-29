@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #myTable_filter label{
                border: 1px solid #eee !important;
        }
          .checked {
      color: #ffc700;
    }

    </style>
@endpush

@section('content')
<style type="text/css">
     .dataTables_filter{
        display: none;
    }

    .agent-location input#searchboxAgent {
    width: 300px;
    border: 4px solid;
    margin-left: 20px;
}
.agent-location {
    align-items: center;
    display: flex;
}
.agent-location h3.box-title {
    font-weight: 700;
    font-size: 20px;
}

 .tooltip {
     position: relative;
     display: inline-block;
     border-bottom: 1px dotted black;
 }

 .tooltip .tooltiptext {
     visibility: hidden;
     width: 120px;
     background-color: black;
     color: #fff;
     text-align: center;
     border-radius: 6px;
     padding: 5px 0;

     /* Position the tooltip */
     position: absolute;
     z-index: 1;
 }

 .tooltip:hover .tooltiptext {
     visibility: visible;
 }

</style>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="agent-location" >
                        <h3 class="box-title pull-left">Certified Agent List </h3>
                        <form action="{{route('search_by_zip_code')}}" method="POST">
                            @csrf()
                            <input type="text" placeholder="Type Location" class="form-control" id="searchboxAgent" name="searchboxAgent" style="display: inline;">
                            <button class="btn btn-sm btn-danger">Search</button>
                        </form>

                    </div>
                    @if(auth()->user()->hasRole('user'))                                           
                        <!-- <a  class="btn btn-success pull-right" href="{{url('user/create')}}"><i class="icon-plus"></i> Add user</a> -->
                        <a  class="btn btn-success pull-right" href="{{route('add_agent')}}"><i class="icon-plus"></i> Add Agent</a>
                    @endif
                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th style="width: 100px">Rating</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip Codes Served</th>
                                        @if(auth()->user()->hasRole('user'))
                                            <th>Status</th>
                                        @endif
                                        <th>Actions</th>
                                        <th>Send Referral</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=1; @endphp
                                    @foreach($users as $key=>$user)
                                        @if(($user->roles()->pluck('name')->implode(', ')) && $user->roles()->pluck('name')->implode(', ')!='agent') @continue @endif
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$user->name}}</td>
                                             <td class="agent-average-rating{{$key}}" ></td>
                                            <td>
                                                @if($user->profile->city)
                                                    {{$user->profile->city}}
                                                @else
                                                    {{strstr($user->profile->address??"Not Available", ',', true)}}
                                                @endif
                                            </td>
                                            <td>{{$user->profile->state??"Not Available"}}</td>
                                            <td>
                                                <?php
                                                    $zips = '';
                                                    for($i=0;$i<=10;$i++){
                                                        $zips .= $user->profile->{'zip'.$i}.',';
                                                        if($i==5) $zips .='<br>';
                                                    }//end for.
                                                    $zips=rtrim(ltrim($zips,','),',');
                                                    if(!$zips){
                                                        $zips='Not Available';
                                                    }//end if.
                                                    echo  $user->profile->zip1;
//                                                    echo $zips;
                                                ?>

                                                {{--{{$user->profile->zip1??"Not Available"}}--}}
                                            </td>
                                                @if(auth()->user()->hasRole('user'))
                                                    <td>
                                                    @if($user->status==1)
                                                        <a href="{{route('update_user_status',[$user->id,0])}}"> <span class='badge badge-success'  style='cursor: pointer;'>Active</span> </a>
                                                    @else
                                                        <a href="{{route('update_user_status',[$user->id,1])}}"> <span class='badge badge-danger'  style='cursor: pointer;'>InActive</span> </a>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <a class="user_profile_detail" data-view='view' attr="{{ $user->id }}" style="cursor: pointer;"><i class="icon-eye"></i> View</a> &nbsp;&nbsp;
                                                        <a href="{{url('user/edit/'.$user->id)}}"><i class="icon-pencil"></i> Edit</a> &nbsp;&nbsp;
                                                        <a class="delete" href="{{url('user/delete/'.$user->id)}}"><i class="icon-trash"></i> Delete</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a class="user_profile_detail" data-view='view' attr="{{ $user->id }}" style="cursor: pointer;"><i class="icon-eye"></i> View</a> &nbsp;&nbsp;
                                                    </td>
                                                @endif
                                            <td>
                                                @if($user->id != Auth::id())
                                                    <a class="user_profile_detail" data-view='referral' attr="{{ $user->id }}"> <span class='badge badge-danger'  style='cursor: pointer;'>Referral</span> </a>
                                                @endif
                                           </td> 
                                        </tr>
                                        @push('js')
                                        <script type="text/javascript">
                                              to = "{{$user->id}}"
                                                $.ajax({
                                                    url: "{{ route('get_all_rating') }}/"+to,
                                                    type: "GET",
                                                    cache: false,
                                                    success: function(html){
                                                      var averageAgentRating = "";
                                                            for (i = 0; i < html.averageInt; i++) {
                                                                averageAgentRating = averageAgentRating + "<span class='fa fa-star checked' style='margin: 2px;'> </span>";
                                                            }
                                                            var rem = 5-html.averageInt;
                                                            for (i = 0; i < rem ; i++) {
                                                                averageAgentRating = averageAgentRating + "<span class='fa fa-star' style='margin: 2px;'> </span>";
                                                            }         
                                                            $('.agent-average-rating{{$key}}').html("<h4 style='display: inline;'></h4>"+averageAgentRating);
                                                        
                                                    }
                                                });
                                        </script>
                                        @endpush
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
    {{-- <style type="text/css">
        .modal-dialog {
          width: 99%;
          height: 95%;
          margin: 0;
          padding: 0;
        }

        .modal-content {
          height: auto;
          min-height: 95%;
          border-radius: 0;
        }
    </style>
    <div class="profile_modal_data"></div> --}}

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    jquery-ui-1.10.3.minimal.min.js
    <script>
        $(document).ready(function () {
            $(document).on('click','.delete',function (e) {
                if(confirm('Are you sure want to delete?'))
                {
                }
                else
                {
                    return false;
                }
            });
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
        @if(auth()->user()->hasRole('user'))
            $(function() {
                $('#myTable').DataTable({
                    "columns": [
                         null,null, null, null,null, null,null, null,{"orderable": false}
                    ]
                });

            });
        @else
            $(function() {
                $('#myTable').DataTable({
                    "columns": [
                        null,null, null, null,null, null,null, {"orderable": false}
                    ]
                });

            });
        @endif
    </script>
   {{--  <script type="text/javascript">
    $(document).on('click','.user_profile_detail',function(e){
        e.preventDefault();
        var id = $(this).attr('attr');
         referral = $(this).attr('data-view');
        $.ajax({
            url: "{{route('get_user_profile_detail')}}",
            type: 'POST',
            data: {_token: "<?php echo csrf_token() ?>", id:id },
            // dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                console.log(data);
                $('.profile_modal_data').html(data);
                $('#exampleModal').modal('show');
                if (referral == 'referral'){                   
                    $(".profile_detail").removeClass('active'); 
                    $(".referral").addClass('active'); 
                }
            },error:function(e){
                $('#exampleModal').modal('hide');
            }
        }); 
    });
</script> --}}
@include('includes.common_search_datatable')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush