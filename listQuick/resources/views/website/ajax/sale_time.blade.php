<div class="container">
  <!-- PAGE-6-START -->
  <div class="row div-center-1 center-6">
    <h3 class="h3-heading text-center">How soon are you looking to @if(Session::get('requestType') == "Sale") Sell? @else Buy?  @endif</h3>
    @forelse($times as $time)
      <div class="radio-toolbar">
        <input type="radio" id="radio-1" name="sale_time_id" value="{{$time->id}}"  />
        <label for="radio-1" class="btn ds-block saletime" data-saletime='{{$time->id}}'>{{$time->duration}}</label>
      </div>
    @empty
      <h3 style="color: white">No Data Available</h3>
    @endforelse
  </div>
  <!-- PAGE-6-END -->
</div>