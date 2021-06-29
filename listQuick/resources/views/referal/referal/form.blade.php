<div class="form-group {{ $errors->has('referal_by') ? 'has-error' : ''}}">
    <label for="referal_by" class="col-md-4 control-label">{{ 'Referred By' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="referal_by" type="number" id="referal_by" value="{{ $referal->referal_by??''}}" >
        {!! $errors->first('referal_by', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('referal_to') ? 'has-error' : ''}}">
    <label for="referal_to" class="col-md-4 control-label">{{ 'Referred To' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="referal_to" type="number" id="referal_to" value="{{ $referal->referal_to??''}}" >
        {!! $errors->first('referal_to', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('referal_client') ? 'has-error' : ''}}">
    <label for="referal_client" class="col-md-4 control-label">{{ 'Referred Client' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="referal_client" type="text" id="referal_client" value="{{ $referal->referal_client??''}}" >
        {!! $errors->first('referal_client', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="text" id="price" value="{{ $referal->price??''}}" >
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fee') ? 'has-error' : ''}}">
    <label for="fee" class="col-md-4 control-label">{{ 'Fee' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fee" type="text" id="fee" value="{{ $referal->fee??''}}" >
        {!! $errors->first('fee', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
    <label for="time" class="col-md-4 control-label">{{ 'Time' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="time" type="text" id="time" value="{{ $referal->time??''}}" >
        {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="col-md-4 control-label">{{ 'Note' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="note" type="textarea" id="note" >{{ $referal->note??''}}</textarea>
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('is_viewed') ? 'has-error' : ''}}">
    <label for="is_viewed" class="col-md-4 control-label">{{ 'Is Viewed' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="is_viewed" type="text" id="is_viewed" value="{{ $referal->is_viewed??''}}" >
        {!! $errors->first('is_viewed', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $referal->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
