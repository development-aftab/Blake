<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatterTopic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chatter_categories';

    protected $appends = ['status_detail'];
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
    protected $fillable = ['parent_id', 'order', 'name', 'color', 'slug', 'status'];

    public function getStatusDetailAttribute(){
        if($this->status==1){
            return "<span class='badge badge-success badge-sm' style='cursor:pointer'>Active</span>";
        }else{
            return "<span class='badge badge-danger badge-sm' style='cursor:pointer'>Inactive<span>";
        }//end if else.
    }
}
