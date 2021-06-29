<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $emoji->user_id or ''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    <label for="post_id" class="col-md-4 control-label">{{ 'Post Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="post_id" type="number" id="post_id" value="{{ $emoji->post_id or ''}}" >
        {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('emoji') ? 'has-error' : ''}}">
    <label for="emoji" class="col-md-4 control-label">{{ 'Emoji' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="emoji" type="text" id="emoji" value="{{ $emoji->emoji or ''}}" >
        {!! $errors->first('emoji', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $emoji->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
