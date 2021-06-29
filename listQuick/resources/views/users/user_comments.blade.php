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
    .rates:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rates:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rates:not(:checked) > label:before {
        content: '★ ';
    }
    .rates > input:checked ~ label {
        color: #ffc700;
    }
    /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>

@foreach($coments as $coment)
    <div class="sl-item">
        <div class="sl-left"> <img src="{{asset('storage/uploads/users/')}}/{{$coment->getReviewedByName->profile->pic??''}}" alt="user" class="img-circle" /> </div>
        <div class="sl-right">
            <div class="m-l-40">
                <a href="#" class="text-info">{{ $coment->getReviewedByName->name??"" }}</a>
                <span class="sl-date">"
                    {{ \Carbon\Carbon::parse($coment->updated_at)->diffForhumans()??""}}"
                    <div class="rates">
                        <?php
                           try {
                                $userRatings   =  App\Rating::where('rating_by',$coment->reviewed_by_id)->where('rating_to',$coment->reviewed_to_id)->first();
                                $userRating = $userRatings->rating??0;
                            } catch (\Exception $e) {
                                $userRating = 0;
                            }//end try catch.
                        ?>
                        <input type="radio" class="rating"  value="5" @if($userRating==5) checked @endif />
                        <label for="star5"  title="text">5 stars</label>
                        <input type="radio" class="rating"  value="4" @if($userRating==4) checked @endif />
                        <label for="star4"  title="text">4 stars</label>
                        <input type="radio" class="rating"  value="3" @if($userRating==3) checked @endif />
                        <label for="star3"  title="text">3 stars</label>
                        <input type="radio" class="rating"  value="2" @if($userRating==2) checked @endif />
                        <label for="star2"  title="text">2 stars</label>
                        <input type="radio" class="rating"  value="1" @if($userRating==1) checked @endif />
                        <label for="star1"  title="text">1 star</label>
                    </div>
                </span>
                <p class="m-t-10"> {{ $coment->message??"" }}</p>
            </div>
        </div>
    </div>
@endforeach