<?php

namespace App\Modules\Worker\Model;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone_number', 'age', 'health_certificate_id', 'national_id', 'passport_image', 'passport_expiration_age',
        'health_certificate_expiration_age', 'national_expiration_age'];


}
