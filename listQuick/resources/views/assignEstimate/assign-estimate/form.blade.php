<div class="form-group {{ $errors->has('estimate_id') ? 'has-error' : ''}}">
    <label for="estimate_id" class="col-md-4 control-label">{{ 'Estimate Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estimate_id" type="number" id="estimate_id" value="{{ $assignestimate->estimate_id or ''}}" >
        {!! $errors->first('estimate_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('agent_id') ? 'has-error' : ''}}">
    <label for="agent_id" class="col-md-4 control-label">{{ 'Agent Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="agent_id" type="number" id="agent_id" value="{{ $assignestimate->agent_id or ''}}" >
        {!! $errors->first('agent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $assignestimate->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
