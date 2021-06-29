<div class="container">
  <!-- PAGE-6-START -->
  <div class="row div-center-1 center-6">
    <h3 class="h3-heading text-center">What is the condition of your home?</h3>
    @foreach($homeConditions as $key=>$homeCondition)
      <div class="radio-toolbar">
        <input type="radio" id="radio-1" class="condition_home" name="sale_time_id" value="{{$homeCondition->id}}"  />
        <label for="radio-1" class="btn ds-block condition_home" data-condition='{{$homeCondition->id}}'>{{$homeCondition->title}}</label>
      </div>
      @endforeach
   
      
   
  </div>
  <!-- PAGE-6-END -->
</div>