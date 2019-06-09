<?php

namespace App\Modules\Category\Model;

use App\Modules\Product\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image'];

    public function Products(){
        return $this->hasMany(Product::class);
    }
}
