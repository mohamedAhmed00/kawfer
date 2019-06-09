<?php

namespace App\Modules\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','quantity','actual_price','final_price','description','category_id'];


}
