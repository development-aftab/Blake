<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Faq extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

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
    protected $fillable = ['type_id', 'title', 'description', 'image', 'status'];

    public function getShortTitleAttribute(){
        return Str::words($this->title, 4, '...');
    } 
   public function getShortDescriptionAttribute(){
        return Str::words($this->description, 5, '...');
    }//end getShortDescriptionAttribute function.    
    public function getTypeName(){
        return $this->belongsTo(Type::class,'type_id');
    }
}
