<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPayment extends Model
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
    // protected $fillable = ['user_id', 'amount', 'amount_captured', 'amount_refunded', 'captured', 'currency', 'description', 'outcome', 'paid', 'payment_method_details', 'receipt_url', 'status'];
    protected $guarded = [];
    public function getUserDetail(){
        return $this->belongsto(User:: class,'user_id');
    }//end getUserDetail function 
    
}
