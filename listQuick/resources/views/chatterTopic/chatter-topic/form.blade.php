<input class="form-control" name="parent_id" type="hidden" id="parent_id" value="{{ $chattertopic->parent_id??''}}" >
{{--<input class="form-control" name="order" type="hidden" id="order" value="{{ $chattertopic->order??""}}" required >--}}
<input class="form-control" name="order" type="hidden" id="order" value="{{ $chattertopic->order??++$orderNo??""}}" required >

{{--<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="col-md-4 control-label">{{ 'Parent Id' }}</label>
    <input class="form-control" name="parent_id" type="number" id="parent_id" value="{{ $chattertopic->parent_id??''}}" >
    <div class="col-md-6">
        <input class="form-control" name="parent_id" type="number" id="parent_id" value="{{ $chattertopic->parent_id??''}}" >
        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>--}}
{{-- <div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    <label for="order" class="col-md-4 control-label">{{ 'Order' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="order" type="number" id="order" value="{{ $chattertopic->order??''}}" required >
        {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name"  value="{{ $chattertopic->name??''}}" required >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="col-md-4 control-label">{{ 'Color' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="color" type="color" id="color" value="{{ $chattertopic->color??''}}" required >
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label for="slug" class="col-md-4 control-label">{{ 'Slug' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="slug" readonly type="text" id="slug" value="{{ $chattertopic->slug??''}}" required >
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="status" id="status">
            <option value="1">Active</option>
            <option value="0">InActive</option>
        </select>
        <!-- <input class="form-control" name="status" type="text" id="status" value="{{ $chattertopic->status??''}}" > -->
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#name").keyup(function(){
                $("#slug").val($(this).val().toLowerCase().replace(" ", "_"));

            });
        });
    </script>
<script>CKEDITOR.replace( 'description' );</script>
@endpush
