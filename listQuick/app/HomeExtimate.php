<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeExtimate extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_extimates';

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
    protected $fillable = ['state', 'location', 'confirm_location', 'selling_time', 'home_condition', 'contract', 'other', 'name', 'email', 'phone', 'lat', 'lng', 'status'];

    public function getconditionDetails(){
        return $this->belongsTo(HomeCondition::class,"home_condition");
    }
}
