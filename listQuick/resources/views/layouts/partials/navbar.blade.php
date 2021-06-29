<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div style="background: white;" class="top-left-part">
            <a class="logo" href="{{route('dashboard')}}">
{{--                 <b>
                    <img src="{{asset('plugins/images/logo.png')}}" alt="home"/>
                </b> --}}
                <span>
                    <img src="{{asset('website/image/logo_dash.png')}}" alt="homepage" class="dark-logo" style="width: 100%"/>
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            @if(session()->get('theme-layout') != 'fix-header')
                <li class="sidebar-toggle">
                    <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                </li>
            @endif


             <li>
                <form role="search" class="app-search hidden-xs">
                    <i class="icon-magnifier"></i>
                    <!-- <input type="text" placeholder="Search..." class="form-control search_bar"> -->
                    <input type="text" placeholder="Search..." class="form-control" id="searchbox">
                </form>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!-- for dynamic referal notifications -->
            <li class="dropdown referal_notifications">
            </li>
            <!-- for dynamic referal notifications -->
            @if(!auth()->user()->hasRole('user')) 
                @if(isset(Auth::user()->getUserPaymentDetails->created_at) && round( (strtotime(Auth::user()->getUserPaymentDetails->created_at->addDays(365)->format('M-d-Y')) - strtotime(date('M-d-Y'))) / (60 * 60 * 24) )>0)
                   {{--  <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                           href="javascript:void(0);">
                            <i class="icon-calender"></i>
                            <span class="badge badge-xs badge-danger">
                                {{round( (strtotime(Auth::user()->getUserPaymentDetails->created_at->addDays(365)->format('D d-M-Y')) - strtotime(date('D d-M-Y'))) / (60 * 60 * 24) )}}
                            </span>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Package Expiration Detail</div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);">
                                    <strong>Expiration Date {{Auth::user()->getUserPaymentDetails->created_at->addDays(365)->format('D M-d-Y')}}</strong>
                                   <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                @elseif(round( (strtotime(Auth::user()->trial_expiry_date) - strtotime(date('M-d-Y'))) / (60 * 60 * 24) )>0)
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                           href="javascript:void(0);">
                            <i class="icon-calender"></i>
                            <span class="badge badge-xs badge-danger">
                                {{round( (strtotime(Auth::user()->trial_expiry_date) - strtotime(date('M-d-Y'))) / (60 * 60 * 24) )}}
                            </span>

                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Trial Expiration</div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);">
                                    <strong>Expiration Date {{Auth::user()->trial_expiry_date}}</strong>
                                    <!-- <i class="fa fa-angle-right"></i> -->
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                           href="javascript:void(0);">
                            <i class="icon-calender"></i>
                            <span class="badge badge-xs badge-danger">
                                0
                            </span>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Package Or Trial Expiry</div>
                            </li>
                            <li>
                                <a class="text-center" href="{{ route('buy_package') }}">
                                    <strong>Package Or Trial Expired</strong>
                                    <i class="fa fa-angle-right"></i><strong>Buy</strong>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif
            <li class="right-side-toggle">
                <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                    <i class="icon-settings"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>