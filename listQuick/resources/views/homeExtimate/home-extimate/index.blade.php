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
                    <h3 class="box-title pull-left">Home Estimate</h3>
                    @can('add-'.str_slug('HomeExtimate'))
                        <a class="btn btn-success pull-right" href="{{ url('/homeExtimate/home-extimate/create') }}"><i
                                    class="icon-plus"></i> Add Home Estimate</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>State</th>
                                <th>Location</th>
                                <th>Confirm Location</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homeextimate as $item)
                                @if(auth()->user()->hasRole('agent'))
                                    @if(isset($homeEstimateIds) && !in_array($item->id,$homeEstimateIds)) @continue @endif
                                @endif
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->state }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->confirm_location }}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('user'))
                                            <a href="{{ route('assign_estimate',[$item->id]) }}"
                                               title="Assign Lead">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Assign to Agent
                                                </button>
                                            </a>
                                        @endif
                                        @can('view-'.str_slug('HomeExtimate'))
                                            <a href="{{ url('/homeExtimate/home-extimate/' . $item->id) }}"
                                               title="View HomeExtimate">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('HomeExtimate'))
                                            <a href="{{ url('/homeExtimate/home-extimate/' . $item->id . '/edit') }}"
                                               title="Edit HomeExtimate">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('HomeExtimate'))
                                            <form method="POST"
                                                  action="{{ url('/homeExtimate/home-extimate' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete HomeExtimate"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $homeextimate->appends(['search' => Request::get('search')])->render() !!} </div>
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

@endpush
