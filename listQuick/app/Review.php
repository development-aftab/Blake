<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
    protected $fillable = ['reviewed_by_id', 'reviewed_to_id', 'revieweer_name', 'message', 'rating', 'status','revieweer_email','revieweer_location'];

    public function getReviewedByName(){
        return $this->belongsTo(User::class,'reviewed_by_id');
    }
    public function getReviewedToName(){
        return $this->belongsTo(User::class,'reviewed_to_id');
    }
}
