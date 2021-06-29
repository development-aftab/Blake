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
                    <h3 class="box-title pull-left">@if(Session::get('request_type') == "sale") Seller  @else Buyer  @endif  Leads</h3>
                    @can('add-'.str_slug('BuySaleProperty'))
                        <a class="btn btn-success pull-right" href="{{ url('/buySaleProperty/buy-sale-property/create') }}"><i
                                    class="icon-plus"></i> Add Buy Sale Property</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Location</th>
                                <th>Requester Name</th>
                                <th>Requester Phone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($buysaleproperty as $item)
                                    @if(auth()->user()->hasRole('agent'))
                                        @if(isset($buySalePropertyIds) && !in_array($item->id,$buySalePropertyIds)) @continue @endif
                                    @endif
                                    {{--@if(trim($item->state) != trim(Auth::user()->profile->state) && trim(Auth::user()->name) != 'Admin' && trim(Auth::user()->name) != 'ListQuick' )@continue @endif--}}
                                    @if(trim($item->request_type) != trim(Session::get('request_type'))) @continue @endif
                                    <tr>
                                        <td>{{ $loop->iteration??$item->id }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->requester_name }}</td>
                                        <td>{{ $item->requester_phone }}</td>
{{--                                        @include('includes.status_badge_html',['variable'=>$item->status??''])--}}
                                        <td>
                                            @if(auth()->user()->hasRole('user'))
                                                <a href="{{ route('assign_lead',[$item->id]) }}"
                                                   title="Assign Lead">
                                                    <button class="btn btn-success btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Assign to Agent
                                                    </button>
                                                </a>
                                            @endif

                                            @can('view-'.str_slug('BuySaleProperty'))
                                                <a href="{{ url('/buySaleProperty/buy-sale-property/' . $item->id) }}"
                                                   title="View BuySaleProperty">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                            @endcan

                                            @can('edit-'.str_slug('BuySaleProperty'))
                                                <a href="{{ url('/buySaleProperty/buy-sale-property/' . $item->id . '/edit') }}"
                                                   title="Edit BuySaleProperty">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                            @endcan

                                            @can('delete-'.str_slug('BuySaleProperty'))
                                                <form method="POST"
                                                      action="{{ url('/buySaleProperty/buy-sale-property' . '/' . $item->id) }}"
                                                      accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete BuySaleProperty"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            @endcan


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $buysaleproperty->appends(['search' => Request::get('search')])->render() !!} </div>
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
    </script>
    @include('includes.common_search_datatable')
@endpush
