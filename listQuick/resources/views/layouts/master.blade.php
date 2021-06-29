<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('website/image/logo_only.png')}}">
    <title>ListQuick</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{asset('plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}"
          rel="stylesheet">
    <link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    <!-- ===== Animation CSS ===== -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{asset('css/common.css')}}" rel="stylesheet">

 
    @stack('css')

    <!--====== Dynamic theme changing =====-->

    @if(session()->get('theme-layout') == 'fix-header')
        <link href="{{asset('css/style-fix-header.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">

    @elseif(session()->get('theme-layout') == 'mini-sidebar')
        <link href="{{asset('css/style-mini-sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    @else
        <link href="{{asset('css/style-normal.css')}}" rel="stylesheet">
        <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css"/>


    <!-- ===== Color CSS ===== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @media (min-width: 768px) {
            .extra.collapse li a span.hide-menu {
                display: block !important;
            }

            .extra.collapse.in li a.waves-effect span.hide-menu {
                display: block !important;
            }

            .extra.collapse li.active a.active span.hide-menu {
                display: block !important;
            }

            ul.side-menu li:hover + .extra.collapse.in li.active a.active span.hide-menu {
                display: block !important;
            }
        }
        .navbar-header{
            background: #ec1c24 !important;
        }
        li.account_setting {
            position: relative;
        }

      /*  li.next a:after {
            content: " ";
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #ededed;
            position: absolute;
            top: 133%;
            left: 33%;
            transform: rotate(
                    180deg
            );
        }*/

        /*for notification navbar.*/
        .n1-i a>button {
            border-radius: 20px !important;
            padding: 3px 14px;
            font-size: 10px;
        }

        .n1-i>a:first-child {
            display: none;
        }
        .n1-i>a {
            padding: 9px 0px;
        }
        .n1-s > a {
            width: 70% !important;
        }
        .inner_n1-s {
            display: flex;
            align-items: end;
        }

        .inner_n1-s>a {
            width: 70% !important;
        }
    </style>
</head>

<body class="@if(session()->get('theme-layout')) {{session()->get('theme-layout')}} @endif">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
@include('layouts.partials.navbar')
<!-- ===== Top-Navigation-End ===== -->

    <!-- ===== Left-Sidebar ===== -->
@include('layouts.partials.sidebar')
@include('layouts.partials.right-sidebar')

<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        @yield('content')
        <style type="text/css">
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
        <div class="profile_modal_data"></div>
        <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                @if((Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick'))
                <center>
                        {!! App\Page::where('slug','office_address_page_content')->first()->description??"" !!}
                        {{--3705 W Pico Blvd Suite #2714 Los Angeles, CA 90019 - All Rights Reserved 2021.--}}
                </center>
                @else
                    <center> &copy;ListQuick, Inc</center>
                @endif
            </div>
        </footer>
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->
<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>


{{--added for tooltip automatic open.--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>

<!-- ===== Bootstrap JavaScript ===== -->
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="{{asset('js/waves.js')}}"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!-- ===== Custom JavaScript ===== -->

@if(session()->get('theme-layout') == 'fix-header')
    <script src="{{asset('js/custom-fix-header.js')}}"></script>
@elseif(session()->get('theme-layout') == 'mini-sidebar')
    <script src="{{asset('js/custom-mini-sidebar.js')}}"></script>
@else
    <script src="{{asset('js/custom-normal.js')}}"></script>
@endif

{{--<script src="{{asset('js/custom.js')}}"></script>--}}
<!-- ===== Plugin JS ===== -->
<script src="{{asset('plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
{{--<script src="{{asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>--}}
<script src="{{asset('plugins/components/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/components/sparkline/jquery.charts-sparkline.js')}}"></script>
<script src="{{asset('plugins/components/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')}}"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="{{asset('plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        getReferalNotifications();
        function getReferalNotifications(){
            $.ajax({
                url: "{{route('get_referal_notification')}}",
                type: 'GET',
                success: function (result) { 
                    $('.referal_notifications').html(result); 
                },error:function(error){
                    console.log(error); 
                }//end
            });

        }//end getReferalNotifications function.
        setInterval(function () {
            getReferalNotifications();
        },100000);

    </script>
    <script type="text/javascript">
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

</script>

@stack('js')

</body>

</html>