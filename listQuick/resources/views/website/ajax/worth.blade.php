<div class="container">
  <!-- PAGE-5-START -->
  <div class="row div-center-1 center-5">
  @if(Session()->get('requestType')  == 'Sale')
     <h3 class="h3-heading heading"><strong>About how much are you looking to sell this property for?</strong></h3>
    @else 
      <h3 class="h3-heading heading"><strong>What is your approximate budget?</strong></h3>
    @endif
    @forelse ($worths as $worth)
      <div class="radio-toolbar">
        <input type="radio" id="radio-1" name="worth_id" class="property" value="{{$worth->id}}"  />
        <label for="radio-1" class="btn ds-block worth" data-worth='{{$worth->id}}'>{{$worth->price}}</label>
      </div> 
    @empty
      <h3 style="color: white">No Data Available</h3>
    @endforelse  </div>
    
    <!-- PAGE-5-END -->
</div>