<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="col-md-4 control-label">{{ 'Location' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="location" type="text" id="location" value="{{ $buysaleproperty->location??''}}" >
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('confirm_location') ? 'has-error' : ''}}">
    <label for="confirm_location" class="col-md-4 control-label">{{ 'Confirm Location' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="confirm_location" type="text" id="confirm_location" value="{{ $buysaleproperty->confirm_location??''}}" >
        {!! $errors->first('confirm_location', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('unit_number') ? 'has-error' : ''}}">
    <label for="unit_number" class="col-md-4 control-label">{{ 'Unit Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="unit_number" type="text" id="unit_number" value="{{ $buysaleproperty->unit_number??''}}" >
        {!! $errors->first('unit_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('property_type_id') ? 'has-error' : ''}}">
    <label for="property_type_id" class="col-md-4 control-label">{{ 'Property Type' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="property_type_id" type="number" id="property_type_id" value="{{ $buysaleproperty->property_type_id??''}}" > --}}
        <select class="form-control" id="property_type_id" name="property_type_id">
            <option value="">Select Property Type</option>
            @foreach($propertyTypes as $item)
                <option value="{{ $item->id }}" @if(isset($buysaleproperty) && $buysaleproperty->property_type_id == $item->id) selected @endif >{{ $item->title }}</option>
            @endforeach
        </select>
        {!! $errors->first('property_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('worth_id') ? 'has-error' : ''}}">
    <label for="worth_id" class="col-md-4 control-label">{{ 'Worth' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="worth_id" type="number" id="worth_id" value="{{ $buysaleproperty->worth_id??''}}" > --}}
        <select class="form-control" id="worth_id" name="worth_id">
            <option value="">Select Worth </option>
            @foreach($worths as $item)
                <option value="{{ $item->id }}" @if(isset($buysaleproperty) && $buysaleproperty->worth_id == $item->id) selected @endif >{{ $item->price }}</option>
            @endforeach
        </select>
        {!! $errors->first('worth_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sale_time_id') ? 'has-error' : ''}}">
    <label for="sale_time_id" class="col-md-4 control-label">{{ 'Sale Time' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="sale_time_id" type="number" id="sale_time_id" value="{{ $buysaleproperty->sale_time_id??''}}" > --}}
        <select class="form-control" id="sale_time_id" name="sale_time_id">
            <option value="">Select Time </option>
            @foreach($saleTimes as $item)
                <option value="{{ $item->id }}" @if(isset($buysaleproperty) && $buysaleproperty->sale_time_id == $item->id) selected @endif >{{ $item->duration }}</option>
            @endforeach
        </select>
        {!! $errors->first('sale_time_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('heard_source_id') ? 'has-error' : ''}}">
    <label for="heard_source_id" class="col-md-4 control-label">{{ 'Heard Source' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="heard_source_id" type="number" id="heard_source_id" value="{{ $buysaleproperty->heard_source_id??''}}" > --}}
        <select class="form-control" id="heard_source_id" name="heard_source_id">
            <option value="">Select HeardSource </option>
            @foreach($heardSources as $item)
                <option value="{{ $item->id }}" @if(isset($buysaleproperty) && $buysaleproperty->heard_source_id == $item->id) selected @endif >{{ $item->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('heard_source_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('agent_id') ? 'has-error' : ''}}">
    <label for="agent_id" class="col-md-4 control-label">{{ 'Agent' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="agent_id" type="number" id="agent_id" value="{{ $buysaleproperty->agent_id??''}}" > --}}
        <select class="form-control" id="agent_id" name="agent_id">
            <option value="">Select Agent </option>
            @foreach($agents as $item)
                @if($item->name=="Admin"||$item->name=="User" ) @continue @endif
                <option value="{{ $item->id }}" @if(isset($buysaleproperty) && $buysaleproperty->agent_id == $item->id) selected @endif >{{ $item->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('agent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('requester_name') ? 'has-error' : ''}}">
    <label for="requester_name" class="col-md-4 control-label">{{ 'Requester Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="requester_name" type="text" id="requester_name" value="{{ $buysaleproperty->requester_name??''}}" >
        {!! $errors->first('requester_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('requester_phone') ? 'has-error' : ''}}">
    <label for="requester_phone" class="col-md-4 control-label">{{ 'Requester Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="requester_phone" type="text" id="requester_phone" value="{{ $buysaleproperty->requester_phone??''}}" >
        {!! $errors->first('requester_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
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
@push('js')
<script>CKEDITOR.replace( 'description' );</script>
@endpush