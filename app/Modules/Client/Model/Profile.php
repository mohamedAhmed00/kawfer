<?php

namespace App\Modules\Client\Model;

use App\Modules\Order\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * @var string
     */
    protected $table ="profiles";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hair_length', 'hair_status', 'hair_type', 'hair_color', 'hair_density', 'hair_last_operation', 'user_id','other_color','other_hair_last_operation'
    ];

}
