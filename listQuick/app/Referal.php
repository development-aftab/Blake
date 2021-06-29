<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Referal extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'referals';

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
    protected $fillable = ['referal_by', 'referal_to', 'referal_client', 'price', 'fee', 'time', 'note', 'is_viewed', 'status','client_name','client_email','client_phone','closing_date','closing_price','closing_property_address','referral_commission_type','commission'];

    public function getReferalByDetails(){
        return $this->belongsTo(User::class,'referal_by');
    }//end getReferalByDetails function.
    public function getReferalToDetails(){
        return $this->belongsTo(User::class,'referal_to');
    }//end getReferalToDetails function.
    public function getShortNoteAttribute(){
        return Str::words($this->note, 4, '');
    }//end getShortNoteAttribute function.    
    
}//end class.
