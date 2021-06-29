<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $userpayment->user_id??''}}" required>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="col-md-4 control-label">{{ 'Amount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="amount" type="number" id="amount" value="{{ $userpayment->amount??''}}" >
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount_captured') ? 'has-error' : ''}}">
    <label for="amount_captured" class="col-md-4 control-label">{{ 'Amount Captured' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="amount_captured" type="text" id="amount_captured" value="{{ $userpayment->amount_captured??''}}" >
        {!! $errors->first('amount_captured', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount_refunded') ? 'has-error' : ''}}">
    <label for="amount_refunded" class="col-md-4 control-label">{{ 'Amount Refunded' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="amount_refunded" type="text" id="amount_refunded" value="{{ $userpayment->amount_refunded??''}}" >
        {!! $errors->first('amount_refunded', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('captured') ? 'has-error' : ''}}">
    <label for="captured" class="col-md-4 control-label">{{ 'Captured' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="captured" type="text" id="captured" value="{{ $userpayment->captured??''}}" >
        {!! $errors->first('captured', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
    <label for="currency" class="col-md-4 control-label">{{ 'Currency' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="currency" type="text" id="currency" value="{{ $userpayment->currency??''}}" >
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $userpayment->description??''}}" >
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('outcome') ? 'has-error' : ''}}">
    <label for="outcome" class="col-md-4 control-label">{{ 'Outcome' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="outcome" type="text" id="outcome" value="{{ $userpayment->outcome??''}}" >
        {!! $errors->first('outcome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
    <label for="paid" class="col-md-4 control-label">{{ 'Paid' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="paid" type="text" id="paid" value="{{ $userpayment->paid??''}}" >
        {!! $errors->first('paid', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('payment_method_details') ? 'has-error' : ''}}">
    <label for="payment_method_details" class="col-md-4 control-label">{{ 'Payment Method Details' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="payment_method_details" type="text" id="payment_method_details" value="{{ $userpayment->payment_method_details??''}}" >
        {!! $errors->first('payment_method_details', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('receipt_url') ? 'has-error' : ''}}">
    <label for="receipt_url" class="col-md-4 control-label">{{ 'Receipt Url' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="receipt_url" type="text" id="receipt_url" value="{{ $userpayment->receipt_url??''}}" >
        {!! $errors->first('receipt_url', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        @include('includes.status_select_html',['variable'=>$userpayment->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
