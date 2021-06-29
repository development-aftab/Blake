<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="col-md-4 control-label">{{ 'Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="price" type="text" id="price" value="{{ $worth->price??''}}" required>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
    <label for="currency" class="col-md-4 control-label">{{ 'Currency' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="currency" type="text" id="currency" value="{{ $worth->currency??'$'}}" >
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'For' }}</label>
   
        <div class="col-md-6">
        <select class="form-control" id="icon" name="property_type">

            <option value="buy" @if(isset($worth->property_type) && $worth->property_type == 'buy' )  selected @endif >Buy</option>
            <option value="sale" @if(isset($worth->property_type) && $worth->property_type == 'sale' )  selected @endif>Sale</option>
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$worth->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
