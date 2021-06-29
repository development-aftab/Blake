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
                    <h3 class="box-title pull-left">Topic</h3>
                    @can('add-'.str_slug('ChatterTopic'))
                        <a class="btn btn-success pull-right" href="{{ url('/chatterTopic/chatter-topic/create') }}"><i
                                    class="icon-plus"></i> Add Topic</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>Parent Id</th><th>Order</th> --}}
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chattertopic as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    {{-- <td>{{ $item->parent_id }}</td><td>{{ $item->order }}</td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->status_detail !!}</td>

                                        <!-- @include('includes.status_badge_html',['variable'=>$item->status??'']) -->
                                    <td>
                                        @can('view-'.str_slug('ChatterTopic'))
                                            <a href="{{ url('/chatterTopic/chatter-topic/' . $item->id) }}"
                                               title="View ChatterTopic">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('ChatterTopic'))
                                            <a href="{{ url('/chatterTopic/chatter-topic/' . $item->id . '/edit') }}"
                                               title="Edit ChatterTopic">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('ChatterTopic'))
                                            <form method="POST"
                                                  action="{{ url('/chatterTopic/chatter-topic' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete ChatterTopic"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $chattertopic->appends(['search' => Request::get('search')])->render() !!} </div>
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
