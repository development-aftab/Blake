<div class="form-group {{ $errors->has('buy_sale_property_id') ? 'has-error' : ''}}">
    <label for="buy_sale_property_id" class="col-md-4 control-label">{{ 'Buy Sale Property Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="buy_sale_property_id" type="number" id="buy_sale_property_id" value="{{ $assignlead->buy_sale_property_id or ''}}" >
        {!! $errors->first('buy_sale_property_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('agent_id') ? 'has-error' : ''}}">
    <label for="agent_id" class="col-md-4 control-label">{{ 'Agent Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="agent_id" type="number" id="agent_id" value="{{ $assignlead->agent_id or ''}}" >
        {!! $errors->first('agent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $assignlead->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
