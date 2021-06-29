<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $office->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="col-md-4 control-label">{{ 'Location' }}</label>
    <div class="col-md-6">
        <!-- <input class="form-control" name="location" type="text" id="location" value="{{ $office->location??''}}" required> -->
        <input type="text"  name="location" id="autocomplete" class="form-control username-field signup-field blake-input" value="{{ $office->location??''}}" required>
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $office->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="col-md-4 control-label">{{ 'Lat' }}</label>
    <div class="col-md-6">
        <input class="form-control" id="latitude" name="lat" type="text" value="{{ $office->lat??''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="col-md-4 control-label">{{ 'Lng' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lng" id="longitude" type="text"  value="{{ $office->lng??''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input type="file" name="image" id="image" class="form-control" @if(isset($office->name))  @else required  @endif  accept="image/*" >
        <input type="hidden" name="oldImage" id="oldImage" class="form-control" value="{{ $office->image??''}}" >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$office->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
<script>CKEDITOR.replace( 'description' );</script>
@endpush