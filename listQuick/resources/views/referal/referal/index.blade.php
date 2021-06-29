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
{{--                    @if(Session::get('referal_type') == 'send')
                     <h3 class="box-title pull-left">Sent Referrals</h3>
                    @elseif(trim(Session::get('referal_type')) == 'accepted')
                    <h3 class="box-title pull-left">Accepted Referrals</h3>
                    @elseif(trim(Session::get('referal_type')) == 'pending')
                     <h3 class="box-title pull-left">Pending Referrals</h3>
                    @else
                     <h3 class="box-title pull-left">Rejected Referrals</h3>
                    @endif--}}

                    <h3 class="box-title pull-left"> @if(ucfirst(trim(Session::get('referal_type')))=='Closed') Completed @else {{ucfirst(trim(Session::get('referal_type')))}} @endif Referrals</h3>
                        @can('add-'.str_slug('Referal'))
                        <a class="btn btn-success pull-right" href="{{ url('/referal/referal/create') }}"><i class="icon-plus"></i> Add Referral</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Referred By</th>
                                <th>Referred To</th>
                                <th>Referred Client</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(Session::get('referal_type') == 'send')
                                    <?php $count=1; ?>
                                    @foreach($referal as $item)
                                        @if($item->referal_by != Auth::user()->id) @continue @endif
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ ucfirst($item->getReferalByDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->getReferalToDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->referal_client) }}</td>
                                                <td>@if(ucfirst($item->status)=='Closed')Completed@else{{ ucfirst($item->status) }}@endif</td>
                                                <td>
                                                    @can('view-'.str_slug('Referal'))
                                                        <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                           title="View Referal">
                                                            <button class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                    @endcan
                                                    @can('edit-'.str_slug('Referal'))
                                                        <a href="{{ url('/referal/referal/' . $item->id . '/edit') }}"
                                                           title="Edit Referal">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                            </button>
                                                        </a>
                                                    @endcan

                                                    @can('delete-'.str_slug('Referal'))
                                                        <form method="POST"
                                                              action="{{ url('/referal/referal' . '/' . $item->id) }}"
                                                              accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete Referal"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                    @endforeach
                                @else
                                    @if(auth()->user()->hasRole('user'))
                                        <?php $count=1; ?>
                                        @foreach($referal as $item)
                                             @if(trim($item->status) != trim(Session::get('referal_type'))) @continue @endif
                                             <tr>
                                                <td>{{ $count++}}</td>
                                                <td>{{ ucfirst($item->getReferalByDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->getReferalToDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->referal_client) }}</td>
                                                <td>
                                                    @if(ucfirst($item->status)=='Closed') Completed @else {{ ucfirst($item->status) }} @endif
                                                </td>
                                                <td>
{{--                                                    @if(trim(Session::get('referal_type')) == 'accepted')--}}
                                                    {{--@can('view-'.str_slug('Referal'))--}}
                                                        <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                           title="View Referal">
                                                            <button class="btn btn-info btn-sm">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                            </button>
                                                        </a>
                                                    {{--@endcan--}}
                                                    {{--@endif--}}

                                                    @can('edit-'.str_slug('Referal'))
                                                        <a href="{{ url('/referal/referal/' . $item->id . '/edit') }}"
                                                           title="Edit Referal">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                            </button>
                                                        </a>
                                                    @endcan

                                                    @can('delete-'.str_slug('Referal'))
                                                        <form method="POST"
                                                              action="{{ url('/referal/referal' . '/' . $item->id) }}"
                                                              accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}

                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete Referal"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                             </tr>
                                        @endforeach
                                    @else
                                        <?php $count=1; ?>
                                        @foreach($referal as $item)
                                             @if(trim($item->status) != trim(Session::get('referal_type'))) @continue @endif
                                             @if($item->referal_to != Auth::user()->id) @continue @endif
                                             <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{ ucfirst($item->getReferalByDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->getReferalToDetails->name??"Not Available") }}</td>
                                                <td>{{ ucfirst($item->referal_client) }}</td>
                                                <td>
                                                    @if(ucfirst($item->status)=='Closed') Completed @else {{ ucfirst($item->status) }} @endif
{{--                                                    @if(trim(Session::get('referal_type')) == 'pending')
                                                        <select class="form-control status" data-id="{{ $item->id }}" id="status">
                                                            <option value="pending" @if($item->status == "pending" ) selected @endif >Pending</option>
                                                            <option value="accepted" @if($item->status == "accepted" ) selected @endif >Accept</option>
                                                            <option value="rejected" @if($item->status == "rejected" ) selected @endif >Reject</option>
                                                        </select>
                                                     @else
                                                     {{ ucfirst($item->status) }}
                                                     @endif--}}
                                                </td>
                                                <td>
                                                    @if(trim(Session::get('referal_type')) == 'accepted')
                                                        @can('view-'.str_slug('Referal'))
                                                            {{--<a href="{{ url('/referal/referal/' . $item->id) }}"
                                                               title="View Referal">
                                                                <button class="btn btn-info btn-sm">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                                </button>
                                                            </a>--}}
                                                            <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                               title="Review Referal">
                                                                <button class="btn btn-success btn-xs circle" style="border-radius: 15px">
                                                                    Review
                                                                </button>
                                                            </a>
                                                        @endcan
                                                    @elseif(trim(Session::get('referal_type')) == 'pending')
                                                        <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                           title="Review Referal">
                                                            <button class="btn btn-success btn-xs circle" style="border-radius: 15px">
                                                                Review
                                                            </button>
                                                        </a>
                                                    @elseif(trim(Session::get('referal_type')) == 'rejected')
                                                        <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                           title="Review Referral">
                                                            <button class="btn btn-success btn-xs circle" style="border-radius: 15px">
                                                                Review
                                                            </button>
                                                        </a>
                                                    @elseif(trim(Session::get('referal_type')) == 'closed')
                                                        <a href="{{ url('/referal/referal/' . $item->id) }}"
                                                           title="Review Referral">
                                                            <button class="btn btn-success btn-xs circle" style="border-radius: 15px">
                                                                Review
                                                            </button>
                                                        </a>
                                                    @endif


                                                    @can('edit-'.str_slug('Referal'))
                                                        <a href="{{ url('/referal/referal/' . $item->id . '/edit') }}"
                                                           title="Edit Referal">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                            </button>
                                                        </a>
                                                    @endcan

                                                    @can('delete-'.str_slug('Referal'))
                                                        <form method="POST"
                                                              action="{{ url('/referal/referal' . '/' . $item->id) }}"
                                                              accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}

                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete Referral"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                             </tr>
                                        @endforeach
                                    @endif
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $referal->appends(['search' => Request::get('search')])->render() !!} </div>
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
        $(document).on('change', '.status', function (e) {
            var value = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: "{{route('change_referal_status')}}/" + value + "/" + id,
                // dataType: "json",

                success: function (result) {
                    location.reload();
                },
                error: function (error) {
                    showSwal('OOPS', 'Invalid , Try agin.', 'error');
                }
            });
        });
    </script>

@endpush
