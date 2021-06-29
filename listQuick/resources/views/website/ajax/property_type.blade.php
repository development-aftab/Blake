<div class="container">
  <!-- PAGE-4-START -->
  <div class="center-4">
    <h3 class="h3-heading heading-1">What kind of property are you looking <br> to @if(Session::get('requestType') == "Sale") Sell? @else Buy?  @endif</h3>
      <div class="row">
        <div class="radio-toolbar-1 col-lg-7 col-md-10 mx-auto">
          <div class="row text-center">
            @forelse ($propertyTypes as $propertyType)
              <div class="box-1 col-md-4 col-sm-12">
                <div class="box-a">
                  <input type="radio" id="radio-1" name="property_type_id" value="{{$propertyType->id}}"  />
                  <label for="radio-1" class="btn ds-block property_id" data-id='{{$propertyType->id}}'><i class="{{$propertyType->icon}}"></i>  {{$propertyType->title}}  </label>
                </div>
              </div>
            @empty
              <h3 style="color: white">No Data Available</h3>
            @endforelse
          </div>
        </div>
      </div>    
  </div>
</div>