<div class="form-group {{ $errors->has('type_id') ? 'has-error' : ''}}">
    <label for="type_id" class="col-md-4 control-label">{{ 'Type Id' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="type_id" type="number" id="type_id" value="{{ $leadership->type_id??''}}" required> --}}
        <select class="form-control" id="type_id" name="type_id">
            <option value="">Select Type </option>
            @foreach($types as $item)
                <option value="{{ $item->id }}" @if(isset($leadership) && $leadership->type_id == $item->id) selected @endif >{{ $item->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $leadership->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $leadership->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input type="file" name="image" id="image" class="form-control" @if(isset($leadership->name))  @else required  @endif accept="image/*">
        <input type="hidden" name="oldImage" id="oldImage" class="form-control" value="{{ $leadership->image??''}}" >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$leadership->status??''])
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