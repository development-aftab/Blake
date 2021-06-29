<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_payments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'package_id', 'amount', 'card_number', 'cvv', 'card_expiration', 'subscription_expiration', 'subscription_status'];

    public function getUserDetail(){
        return $this->belongsto(User:: class,'user_id');
    }//end getUserDetail function 
    
}
