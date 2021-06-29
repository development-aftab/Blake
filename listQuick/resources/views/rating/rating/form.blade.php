<div class="form-group {{ $errors->has('rating_by') ? 'has-error' : ''}}">
    <label for="rating_by" class="col-md-4 control-label">{{ 'Rating By' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rating_by" type="number" id="rating_by" value="{{ $rating->rating_by or ''}}" required>
        {!! $errors->first('rating_by', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rating_to') ? 'has-error' : ''}}">
    <label for="rating_to" class="col-md-4 control-label">{{ 'Rating To' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rating_to" type="number" id="rating_to" value="{{ $rating->rating_to or ''}}" required>
        {!! $errors->first('rating_to', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
    <label for="rating" class="col-md-4 control-label">{{ 'Rating' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rating" type="text" id="rating" value="{{ $rating->rating or ''}}" required>
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $rating->status or ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
