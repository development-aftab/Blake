<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $testimonial->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $testimonial->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="col-md-4 control-label">{{ 'Location' }}</label>
    <div class="col-md-6">

        <input type="text"  name="location" id="autocomplete" class="form-control username-field signup-field blake-input" value="{{ $testimonial->location??''}}" required>
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input type="file" name="image" id="image" class="form-control" accept="image/*" >
        <input type="hidden" name="oldImage" value="{{$testimonial->image??''}}" id="oldImage">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$testimonial->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&libraries=places"></script>
  <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU=places&callback=initAutocomplete" type="text/javascript"></script> -->
  <script>
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
  </script>
  <script>
     google.maps.event.addDomListener(window, 'load', initialize);

     function initialize() {
         var input = document.getElementById('autocomplete');
         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#state').val(place.name);
             $('#latitude').val(place.geometry['location'].lat());
             $('#longitude').val(place.geometry['location'].lng());
             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");
         });
     }
  </script>
@push('js')
<script>CKEDITOR.replace( 'description' );</script>
@endpush