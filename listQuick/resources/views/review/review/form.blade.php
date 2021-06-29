<div class="form-group {{ $errors->has('reviewed_by_id') ? 'has-error' : ''}}">
    <label for="reviewed_by_id" class="col-md-4 control-label">{{ 'Reviewed By Id' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="reviewed_by_id" type="number" id="reviewed_by_id" value="{{ $review->reviewed_by_id??''}}" > --}}
        <select class="form-control" id="reviewed_by_id" name="reviewed_by_id">
            <option value="">Reviewed By </option>
            @foreach($reviewed as $item)
                <option value="{{ $item->id }}" @if(isset($review) && $review->reviewed_by_id == $item->id) selected @endif >{{ $item->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('reviewed_by_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('reviewed_to_id') ? 'has-error' : ''}}">
    <label for="reviewed_to_id" class="col-md-4 control-label">{{ 'Reviewed To Id' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="reviewed_to_id" type="text" id="reviewed_to_id" value="{{ $review->reviewed_to_id??''}}" > --}}
        <select class="form-control" id="reviewed_to_id" name="reviewed_to_id">
            <option value="">Reviewed To </option>
            @foreach($reviewed as $item)
                <option value="{{ $item->id }}" @if(isset($review) && $review->reviewed_to_id == $item->id) selected @endif >{{ $item->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('reviewed_to_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('revieweer_name') ? 'has-error' : ''}}">
    <label for="revieweer_name" class="col-md-4 control-label">{{ 'Revieweer Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="revieweer_name" type="text" id="revieweer_name" value="{{ $review->revieweer_name??''}}" >
        {!! $errors->first('revieweer_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="col-md-4 control-label">{{ 'Message' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="message" type="text" id="message" value="{{ $review->message??''}}" >
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
    <label for="rating" class="col-md-4 control-label">{{ 'Rating' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rating" type="text" id="rating" value="{{ $review->rating??''}}" >
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="status" type="text" id="status" value="{{ $review->status??''}}" > --}}
        @include('includes.status_select_html',['variable'=>$review->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
