<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="col-md-4 control-label">{{ 'State' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="state" type="text" id="state" value="{{ $homeextimate->state or ''}}" >
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="col-md-4 control-label">{{ 'Location' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="location" type="text" id="location" value="{{ $homeextimate->location or ''}}" >
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('confirm_location') ? 'has-error' : ''}}">
    <label for="confirm_location" class="col-md-4 control-label">{{ 'Confirm Location' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="confirm_location" type="text" id="confirm_location" value="{{ $homeextimate->confirm_location or ''}}" >
        {!! $errors->first('confirm_location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('selling_time') ? 'has-error' : ''}}">
    <label for="selling_time" class="col-md-4 control-label">{{ 'Selling Time' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="selling_time" type="text" id="selling_time" value="{{ $homeextimate->selling_time or ''}}" >
        {!! $errors->first('selling_time', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('home_condition') ? 'has-error' : ''}}">
    <label for="home_condition" class="col-md-4 control-label">{{ 'Home Condition' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="home_condition" type="text" id="home_condition" value="{{ $homeextimate->home_condition or ''}}" >
        {!! $errors->first('home_condition', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('contract') ? 'has-error' : ''}}">
    <label for="contract" class="col-md-4 control-label">{{ 'Contract' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="contract" type="text" id="contract" value="{{ $homeextimate->contract or ''}}" >
        {!! $errors->first('contract', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('other') ? 'has-error' : ''}}">
    <label for="other" class="col-md-4 control-label">{{ 'Other' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="other" type="text" id="other" value="{{ $homeextimate->other or ''}}" >
        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $homeextimate->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $homeextimate->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ $homeextimate->phone or ''}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="col-md-4 control-label">{{ 'Lat' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lat" type="number" id="lat" value="{{ $homeextimate->lat or ''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="col-md-4 control-label">{{ 'Lng' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lng" type="number" id="lng" value="{{ $homeextimate->lng or ''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $homeextimate->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
