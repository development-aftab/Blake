<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="col-md-4 control-label">{{ 'User Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ $paymentdetail->user_id??''}}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('package_id') ? 'has-error' : ''}}">
    <label for="package_id" class="col-md-4 control-label">{{ 'Package Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="package_id" type="number" id="package_id" value="{{ $paymentdetail->package_id??''}}" >
        {!! $errors->first('package_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="col-md-4 control-label">{{ 'Amount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="amount" type="text" id="amount" value="{{ $paymentdetail->amount??''}}" >
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->
<div class="form-group {{ $errors->has('card_number') ? 'has-error' : ''}}">
    <label for="card_number" class="col-md-4 control-label">{{ 'Card Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="card_number" type="text" id="card_number" value="{{ $paymentdetail->card_number??''}}" >
        {!! $errors->first('card_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cvv') ? 'has-error' : ''}}">
    <label for="cvv" class="col-md-4 control-label">{{ 'Cvv' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cvv" type="text" id="cvv" value="{{ $paymentdetail->cvv??''}}" >
        {!! $errors->first('cvv', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('card_expiration') ? 'has-error' : ''}}">
    <label for="card_expiration" class="col-md-4 control-label">{{ 'Card Expiration' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="card_expiration" type="text" id="card_expiration" value="{{ $paymentdetail->card_expiration??''}}" >
        {!! $errors->first('card_expiration', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="form-group {{ $errors->has('subscription_expiration') ? 'has-error' : ''}}">
    <label for="subscription_expiration" class="col-md-4 control-label">{{ 'Subscription Expiration' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subscription_expiration" type="text" id="subscription_expiration" value="{{ $paymentdetail->subscription_expiration??''}}" >
        {!! $errors->first('subscription_expiration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subscription_status') ? 'has-error' : ''}}">
    <label for="subscription_status" class="col-md-4 control-label">{{ 'Subscription Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subscription_status" type="text" id="subscription_status" value="{{ $paymentdetail->subscription_status??''}}" >
        {!! $errors->first('subscription_status', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
