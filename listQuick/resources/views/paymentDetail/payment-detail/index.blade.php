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
                    <h3 class="box-title pull-left">Payment Detail</h3>
                    @can('add-'.str_slug('PaymentDetail'))
                        <a class="btn btn-success pull-right" href="{{ url('/paymentDetail/payment-detail/create') }}"><i
                                    class="icon-plus"></i> Add Payment Detail</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Card Number</th>
                                <th>CVV</th>
                                <th>Card Expiration</th>
                                <th>Subscribed on</th>
                                <th>Expiration</th>
                                <th>Current Status</th>
                                @if(!(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick'))                                
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paymentdetail as $item)
                                @if(!(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick'))
                                    @if($item->user_id != Auth::id()) @continue @endif
                                @endif
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->subscription_id??"Not Available" }}</td>
                                    <td>{{ $item->getUserDetail->name??"Not Available" }}</td>
                                    <td>{{ $item->amount??"Not Available" }}</td>
                                    <td>{{ $item->card_number??"Not Available" }}</td>
                                    <td>{{ $item->cvv??"Not Available" }}</td>
                                    <td>{{ $item->card_expiration??"Not Available" }}</td>
                                    <td>{{ $item->getUserDetail->getUserPaymentDetails->created_at->format('D d-M-Y')??"Not Available" }}</td>
                                    <td>{{ $item->getUserDetail->getUserPaymentDetails->created_at->addDays(365)->format('D d-M-Y')??"Not Available" }}</td>
                                    <td>
                                        @if($item->subscription_status=='active')
                                           <form method="POST" action="{{ route('update_payment_status') }}" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_payment_id" value="{{ $item->id }}">
                                                <input type="hidden" name="subscription_status" value="inactive">
                                                <input type="hidden" name="subscription_id" value="{{ $item->subscription_id }}">
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm(&quot;Do you want to cancel Subscription?&quot;)"><i class="fa fa-check" aria-hidden="true"></i> Active
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('update_payment_status') }}" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_payment_id" value="{{ $item->id }}">
                                                <input type="hidden" name="subscription_status" value="active">
                                                <input type="hidden" name="subscription_id" value="{{ $item->subscription_id }}">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Activate Subscription?&quot;)"><i class="fa fa-check" aria-hidden="true"></i> InActive
                                                </button>
                                            </form>                                        
                                        @endif                                        
                                    </td>   
                                    <!-- <td>{{ ucfirst($item->subscription_status??"Not Available") }}</td> -->
                                    
                                    <td>
                                        @if(!(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick'))
                                            @if($loop->last)
    <!--                                             @can('view-'.str_slug('PaymentDetail'))
                                                    <a href="{{ url('/paymentDetail/payment-detail/' . $item->id) }}"
                                                       title="View PaymentDetail">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </button>
                                                    </a>
                                                @endcan -->

                                                @can('edit-'.str_slug('PaymentDetail'))
                                                    <a href="{{ url('/paymentDetail/payment-detail/' . $item->id . '/edit') }}"
                                                       title="Edit PaymentDetail">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                        </button>
                                                    </a>
                                                @endcan

                                                @can('delete-'.str_slug('PaymentDetail'))
                                                    <form method="POST"
                                                          action="{{ url('/paymentDetail/payment-detail' . '/' . $item->id) }}"
                                                          accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Delete PaymentDetail"
                                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            @else
                                                <button type="button" class="btn btn-primary btn-sm" title="Delete PaymentDetail" disabled ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $paymentdetail->appends(['search' => Request::get('search')])->render() !!} </div>
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
