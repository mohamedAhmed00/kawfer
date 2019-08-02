<?php

namespace App\Modules\Order\Model;

use App\Modules\Credential\Model\User;
use App\Modules\Product\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','total'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function OrderProducts()
    {
        return $this->belongsToMany(Product::class,'product_orders')->withPivot('quantity');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
