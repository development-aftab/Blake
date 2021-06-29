<div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    <label for="duration" class="col-md-4 control-label">{{ 'Duration' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="duration" type="textarea" id="duration" required>{{ $time->duration??''}}</textarea>
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'For' }}</label>
   
        <div class="col-md-6">
        <select class="form-control" id="icon" name="property_type">

            <option value="buy" @if(isset($time->property_type) && $time->property_type == 'buy' )  selected @endif >Buy</option>
            <option value="sale" @if(isset($time->property_type) && $time->property_type == 'sale' )  selected @endif>Sale</option>
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$time->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
