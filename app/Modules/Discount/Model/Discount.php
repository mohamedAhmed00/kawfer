<?php

namespace App\Modules\Discount\Model;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = "operation_discounts";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['percentage'];


}
