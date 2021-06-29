<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="title" type="textarea" id="title" >{{ $homecondition->title ?? ''}}</textarea>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
   
    <div class="col-md-6">
        <input class="form-control" name="status" type="hidden" id="status" value="{{ $homecondition->status ?? ''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>
@push('js')
<script>CKEDITOR.replace( 'title' );</script>
@endpush