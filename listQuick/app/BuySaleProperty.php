<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuySaleProperty extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'buy_sale_properties';

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
    protected $fillable = ['location', 'confirm_location', 'unit_number', 'property_type_id', 'worth_id', 'sale_time_id', 'heard_source_id', 'agent_id', 'requester_name', 'requester_phone', 'requester_email', 'status','lat','lng','request_type','country','state'];
    
    public function getPropertyTypeDetail(){
        return $this->belongsTo(PropertyType::class,'property_type_id');
    }
    public function getWorthDetail(){
        return $this->belongsTo(Worth::class,'worth_id');
    }
    public function getSaleTimeDetail(){
        return $this->belongsTo(Time::class,'sale_time_id');
    }
    public function getHeardSourceDetail(){
        return $this->belongsTo(HeardSource::class,'heard_source_id');
    }
    public function getAgentDetail(){
        return $this->belongsTo(User::class,'agent_id');
    }
}

