<div class="container">
  <!-- PAGE-10-START -->
  <div class="row center-10">
    <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
      <h3 class="h3-heading heading blake-size-31 property-heading">Are you also looking to  @if(Session::get('requestType')=='Sale') Buy @else Sell @endif a property?</h3>

      <div class="radio-toolbar">
        <input type="radio" id="radio-1" name="radioFruit" value="No"  />
        <label for="radio-1" class="btn ds-block blake-radio buy_property" data-buyproperty="NO" >No</label>

        <input type="radio" id="radio-2" name="radioFruit" value="Yes" />
        <label for="radio-2" class="btn ds-block blake-radio buy_property" data-buyproperty="buyer" >Yes</label>
      </div>
    </div>
  </div>
  <!-- PAGE-10-END -->
</div>