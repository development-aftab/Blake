<!-- Modal -->
<style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    .checked {
      color: #ffc700;
    }
  .user-bg .overlay-box{

    background:#34343A !important;
  }

  @media(max-width:1280px){
      .user-btm-box h4 {
          display: block !important;
          width: 100%;
      }

  }
    a.send-referal-btn span {
        background: red;
        padding: 5px 10px;
        color: #fff;
        border-radius: 35px;
        font-weight: 700;
    }
    .error{
        color: red;
    }
    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="max-width: 80% !important;margin: 0 auto">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg">
                    <!-- <img width="100%" alt="user" src="{{asset('plugins/images/large/img1.jpg')}}"> -->
                    <div class="overlay-box">
                        <a href="{{ redirect()->getUrlGenerator()->previous() }}"><span class="badge badge-info" style="float: left;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</span></a>
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                @if(isset($user->profile) && $user->profile->pic)
                                    <img src="{{asset('storage/uploads/users/'.$user->profile->pic)}}" class="thumb-lg img-circle" alt="img">
                                @else
                                    <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" class="thumb-lg img-circle" alt="img">
                                @endif
                            </a>
                            <h4 class="text-white">{{$user->name??"Not Available"}}</h4>
                            <h5 class="text-white">{{preg_replace('/[0-9]+/', '', $user->profile->state??"Not Available")}}</h5>
                             <h5 class="text-white">{{strstr($user->profile->address??"Not Available", ',', true)??"Not available"}}</h5>
                             </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="col-md-4 col-sm-4 text-center">
                        <a style="font-size: 27px" href="{{$user->profile->facebook??'Not Available'}}" target="_blank"><p class="text-blue"><i class="ti-facebook"></i></p></a>
                        <!-- <h1>258</h1>  -->
                    </div>
                     <div class="col-md-4 col-sm-4 text-center">
                       <a style="font-size: 27px" href="{{$user->profile->dribbble??'Not Available'}}" target="_blank"> <p class="text-danger"><i class="ti-dribbble"></i></p></a>
                        <!-- <h1>556</h1>  -->
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                       <a style="font-size: 27px" href="{{$user->profile->twitter??'Not Available'}}"  target="_blank"> <p class="text-blue"><i class="ti-linkedin"></i></p></a>
                        <!-- <h1>125</h1>  -->
                        </div>

                </div>
                <div class="user-btm-box agent-average-rating" style="font-size: 20px;padding: 0; text-align: center;"></div>
            </div>
{{--            @if(!auth()->user()->hasRole('user'))--}}
                <div class="white-box">
                    <div class="user-btm-box">
                        <h3 align="center">Zip Codes Served</h3>
                        <div align="center">
                            @for($i=1;$i<=10;$i++)
                                <p align="center" style="display: inline"><b style="color: #000;">{{$user->profile->{'zip'.$i} }}</b></p> &nbsp;
                                @if($i==5) <br> @endif
                            @endfor
                        </div>
                    </div>
                </div>
            {{--@endif--}}


        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab profile_detail">
                        <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Profile</span> </a>
                    </li>
                @if($user->name != 'ListQuick')
                    <li class="tab">
                        <a href="#ratings" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Ratings</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#reviews" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Reviews</span> </a>
                    </li>
                    @if($user->id !=  Auth::id())
                      <li class="tab referral">
                        <a class="send-referal-btn" href="#Referal" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Send Referral</span> </a>
                    </li>
                    @endif
                @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active profile_detail" id="profile">
                        <br><br>
                        <div class="row">
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{$user->name??"Not Available"}}</p>
                            </div>
                             <div class="col-md-4 col-xs-6 b-r"> <strong>City</strong>
                                <br>
                                 @if(!strstr($user->profile->address??'', ',', true))
                                    <p class="text-muted">{{ $user->profile->city??'Not Available' }}</p>
                                 @else
                                     <p class="text-muted">{{ preg_replace('/[0-9]+/', '', strstr($user->profile->address??'Not Available', ',', true)??"Not available") }}</p>
                                 @endif
                             </div>
                            <div class="col-md-4 col-xs-6 b-r"> <strong>State</strong>
                                <br>
                                <p class="text-muted">{{ preg_replace('/[0-9]+/', '', $user->profile->state??"Not Available") }}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{$user->email??"Not Available"}}</p>
                            </div>
                            @if($user->name != 'ListQuick')
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Office Phone</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->office_phone??"Not Available"}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->profile->mobile_phone??'Not Available' }}</p>
                                </div>
                            @else
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Office Phone</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->office_phone??"Not Available"}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Address</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->profile->address??"Not Available" }}</p>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            @if($user->name != 'ListQuick')
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Address</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->profile->address??"Not Available" }}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Country</strong>
                                     <br>
                                     <p class="text-muted">{{$user->profile->country??"Not Available"}}</p>
                                 </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Principle Brokerage</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->brokerage_name??"Not Available"}}</p>
                                </div>
                            @endif
                        </div>
                        @if($user->name != 'ListQuick')
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> <strong>License State</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->license_state??"Not Available"}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>License #</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->license_number??"Not Available"}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Work with Buyers</strong>
                                    <br>
                                    <p class="text-muted">  {{ucfirst($user->profile->work_with_buyers??"No")}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Number of Transactions Last Year</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->profile->area_sales??"Not Available" }}</p>
                                </div>

                                 <div class="col-md-4 col-xs-6 b-r"> <strong>Years in Marketplace</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->out_area_sales??"Not Available"}}</p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Average Days on Market</strong>
                                    <br>
                                    <p class="text-muted">{{$user->profile->condo??"0"}}</p>
                                </div>
                            </div>
                            <hr>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-xs-12 b-r"> <strong>Bio</strong>
                                <br>
                                <p class="text-muted">{{$user->profile->bio??"Not Available"}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="ratings">
                        <br><br>
                        @if($user->id != Auth::id())
                            <div class="rate">
                                <input type="radio" class="rating" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" class="rating" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" class="rating" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" class="rating" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" class="rating" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        @endif
                        <p class="font-bold m-t-30" id="detali_rating"></p>
                        <h5>5 star<span class="pull-right" id="rating_5"></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success rating_5" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="1000"> <span class="sr-only" ></span> </div>
                        </div>
                        <h5>4 star <span class="pull-right" id="rating_4"></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-custom rating_4" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="1000" > <span class="sr-only" ></span> </div>
                        </div>
                        <h5>3 star <span class="pull-right" id="rating_3"></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary rating_3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="1000" > <span class="sr-only" ></span> </div>
                        </div>
                        <h5>2 star <span class="pull-right" id="rating_2"></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger rating_2" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="1000" > <span class="sr-only" id=""></span> </div>
                        </div>
                        <h5>1 star <span class="pull-right" id="rating_1"></span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger rating_1" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="1000" > <span class="sr-only" ></span> </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="reviews">
                        <br><br>
                        <div class="steamline">
                            <div id="coments_box"></div>
                            {{--<hr>--}}
                            <span id="comment_error" style="color: red"></span>
                            <textarea id="coment_text" class="form-control" id="review" name="review" rows="4"></textarea>
                            <button data-to="{{$user->id}}" data-form = "{{ Auth::id() }}" id="coment" class="btn btn-info form-control" style="background: #00bbd9;color: white;font-weight: bold;">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane referral" id="Referal">
                        <br><br>
                        <div class="steamline">
                            <div id="Referal_box">
                                <form class="form-horizontal" id="myform">


                                    @csrf
                                    <input type="hidden" name="to" value="{{$user->id}}">
                                    <input type="hidden" name="form" value="{{Auth::id()}}">
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="client">Referring Client:</label>
                                    <div class="col-sm-9">
                                      <select class="form-control client" name="referal_client" id="client" required>
                                        <option value="buyer" >Buyer</option>
                                        <option value="seller" >Seller</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Client Name: </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control price" id="client_name" name="client_name" placeholder="Enter Client Name" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Client Phone Number:</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control price" id="client_phone" name="client_phone" placeholder="Enter Client Phone Number" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Client Email:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control price" id="client_email" name="client_email" placeholder="Client Email" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Approx Price Point:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control price" id="price" name="price" placeholder="Enter Approx Price Point" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Time Frame:</label>
                                    <div class="col-sm-6">
                                      <input type="text" class="form-control time" id="time" name="time" placeholder="Enter Time Frame" required>
                                    </div>
                                    <div class="col-sm-3">
                                     <select class="form-control Months" name="Months" id="Months">
                                        <option value=" Months" >Months</option>
                                        <option value=" Years" >Years</option>
                                        <option value=" Days" >Days</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Referral Fee %:</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control fee" id="fee" name="fee" placeholder="Enter Referral Fee %" required>
                                      <span style="color: red;">At ListQuick we understand that the industry standard is a 25% referral fee between agents. However, we leave it up to our Certified Agents to negotiate their referral rate between each other.
                                      </span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Note:</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control note" id="note" name="note" placeholder="Enter Note" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                  </div>
                             </form>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    getRating()
    getAllRating()
    getFeedback()
    $( "#coment" ).click(function() {
        to        = $(this).attr('data-to');
        form      = $(this).attr('data-form');
        coment    = $('#coment_text').val();
        if(coment==""){
            $('#comment_error').text('This Field is Required');
        }else{
            $('#comment_error').text('');
            $.ajax({
                url: "{{ route('feed_back') }}/"+coment+'/'+to+'/'+form,
                type: "GET",
                cache: false,
                success: function(html){
                    getFeedback()
                    $('#coment_text').val("");
                }
            });
        }//end if else.
    });
    function getFeedback(){
        to = "{{$user->id}}";
        $.ajax({
            url: "{{ route('get_feed_back') }}/"+to,
            type: "GET",
            cache: false,
            success: function(html){
                $('#coments_box').html(html)
            }
        });
    }
    $( ".rating" ).click(function() {
        rating = $(this).val();
        to = "{{$user->id}}"
        form = "{{ Auth::id() }}"
        $.ajax({
            url: "{{ route('ratings') }}/"+rating+'/'+to+'/'+form,
            type: "GET",
            cache: false,
            success: function(html){
                getRating()
                getAllRating()
            }
        });
    });
    function getRating(){
        to = "{{$user->id}}"
        form = "{{ Auth::id() }}"
        $.ajax({
            url: "{{ route('get_rating') }}/"+to+'/'+form,
            type: "GET",
            cache: false,
            success: function(html){
                console.log(html.msg)
                if(html.msg!='fail.'){
                    $("input[name=rate][value=" + html.rating.rating + "]").attr('checked', 'checked');
                }//end if.
            }
        });
    }
    function getAllRating(){
        to = "{{$user->id}}"
        $.ajax({
            url: "{{ route('get_all_rating') }}/"+to,
            type: "GET",
            cache: false,
            success: function(html){
                rating_5_class = html.rating_5/html.ratings*100;
                rating_4_class = html.rating_4/html.ratings*100;
                rating_3_class = html.rating_3/html.ratings*100;
                rating_2_class = html.rating_2/html.ratings*100;
                rating_1_class = html.rating_1/html.ratings*100;
                $('.rating_5').css('width',(rating_5_class) + '%');
                $('.rating_4').css('width',(rating_4_class) + '%');
                $('.rating_3').css('width',(rating_3_class) + '%');
                $('.rating_2').css('width',(rating_2_class) + '%');
                $('.rating_1').css('width',(rating_1_class) + '%');
                $('#rating_5').html(html.rating_5);
                $('#rating_4').html(html.rating_4);
                $('#rating_3').html(html.rating_3);
                $('#rating_2').html(html.rating_2);
                $('#rating_1').html(html.rating_1);
                $('#detali_rating').html(html.average+' average based on '+html.ratings+' reviews.');
            @if($user->name != 'ListQuick' )
                showAverageRating(html.averageInt);
            @endif
            }
        });
    }

    function showAverageRating(average){

        var averageAgentRating = "";
        for (i = 0; i < average; i++) {
            averageAgentRating = averageAgentRating + "<span class='fa fa-star checked' style='margin: 2px;'> </span>";
        }
        var rem = 5-average;
        for (i = 0; i < rem ; i++) {
            averageAgentRating = averageAgentRating + "<span class='fa fa-star' style='margin: 2px;'> </span>";
        }
        $('.agent-average-rating').html("<h4 style='display: inline;'>Current Rating: </h4>"+averageAgentRating);
    }
    $( "#myform" ).validate({
            rules: {
                client: {
                    required: true,
                },
                price: {
                    required: true,
                },
                time: {
                    required: true,
                },
                fee: {
                    required: true,
                },
                client_name:{
                    required:true
                },
                client_phone:{
                    required:true
                },
                client_email:{
                    required:true
                }

            },
            submitHandler: function(form,e) {
                e.preventDefault();
                $.ajax({
                        url: "{{ route('referring_submint') }}",
                        type: 'post',
                        dataType: 'json',
                        data: $("#myform").serialize(),
                        success: function(data) {
                            $("#time").val("");
                            $("#price").val("");
                            $("#fee").val("");
                            $("#note").val("");
                            $("#client_name").val("");
                            $("#client_email").val("");
                            $("#client_phone").val("");
                            swal({
                                title:  'Done',
                                text:   'Your referral is being submitted now and your referring agent will contact you soon',
                                icon:   'success',
                                timer:  10000,
                                showCancelButton: false,
                            });
//                         alert('Your referral is being submitted now and your referring agent will contact you soon');
                        }
                });
            }
    });
</script>