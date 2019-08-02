<?php

namespace App\Modules\Invoice\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'schedule_id','pdf'];


}
