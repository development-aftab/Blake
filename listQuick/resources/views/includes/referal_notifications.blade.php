<a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
   href="javascript:void(0);">
    <i class="icon-bell"></i>
        @if(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick')
            <span class="badge badge-xs badge-danger">{{$referals->count()??"0"}}</span>
        @else   
            <span class="badge badge-xs badge-danger">{{$referals->where('referal_to',Auth::id())->count()??"0"}}</span>
        @endif
</a>
<ul class="dropdown-menu mailbox animated bounceInDown">
    <li>
        @if(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick')
            <div class="drop-title">{{$referals->count()??"0"}} Referral Requests</div>
        @else   
            <div class="drop-title">You have {{$referals->where('referal_to',Auth::id())->count()??"0"}} New Referral Requests</div>        
        @endif
    </li>
    <li>
        <div class="message-center">
            <div class="n1-s">                
                @if(Auth::user()->name == 'User' || Auth::user()->name == 'ListQuick')
                    @foreach($referals as $referal)
                        <div class="inner_n1-s">
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    @if($referal->getReferalByDetails->profile->pic == null)
                                        <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="user" class="img-circle">
                                    @else
                                        <img src="{{asset('storage/uploads/users/'.$referal->getReferalByDetails->profile->pic)}}" alt="user" class="img-circle">
                                    @endif
                                    <span class="profile-status pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>{{$referal->getReferalByDetails->name??"Not Available"}}</h5>
                                    <span class="mail-desc">{{$referal->shortNote??"Not Available"}}</span>
                                    {{--<span class="time">{{$referal->created_at->format('h:i A')}}</span>--}}
                                </div>
                                <div class="n1-i">
                                    <a href="{{url('referal/referal').'/'.$referal->id}}">
                                        <button disabled type="button" class="btn btn-sm btn-success">Review</button>
                                    </a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    @foreach($referals->where('referal_to',Auth::id()) as $referal)
                        <div class="inner_n1-s">
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    @if($referal->getReferalByDetails->profile->pic == null)
                                        <img src="{{asset('storage/uploads/users/no_avatar.jpg')}}" alt="user" class="img-circle">
                                    @else
                                        <img src="{{asset('storage/uploads/users/'.$referal->getReferalByDetails->profile->pic)}}" alt="user" class="img-circle">
                                    @endif
                                    <span class="profile-status pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>{{$referal->getReferalByDetails->name??"Not Available"}}</h5>
                                    <span class="mail-desc">{{$referal->shortNote??"Not Available"}}</span>
                                </div>
                                <div class="n1-i">
                                    <a href="{{url('referal/referal').'/'.$referal->id}}">
                                        <button type="button" class="btn btn-sm btn-success">Review</button>
                                    </a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif                
            </div>
        </div>
    </li>
    <li>
    {{-- <li @if(Request::is('referal/referal') && Session::get('referal_type')=='pending') {{ "class='active'" }} @endif><a style="cursor: pointer;" id="peding">Pending Referrals</a></li> --}}
        <!-- <a class="text-center" href="javascript:void(0);"> -->
        <a id="peding" class="text-center" style="cursor: pointer;">
            <strong>See All Pending Referrals</strong>
            <i class="fa fa-angle-right"></i>
        </a>
    </li>
</ul>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
  $('#peding').click(function(e){
            e.preventDefault();
            $.ajax({
              {{--url: "{{ route('referal_type') }}/accepted",--}}
              url: "{{ route('referal_type') }}/pending",
              type: "GET",
              cache: false,
              success: function(result){
                window.location.href = "{{ url('referal/referal') }}"
              }
            });
        });
</script>




<style type="text/css">
    
.n1-s > a {
    width: 80%;
    display: inline-block;
}
 .n1-i {
    width: 20%;
    display: inline-block;
}
</style>
