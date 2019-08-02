<?php

namespace App\Modules\Operation\Model;

use Illuminate\Database\Eloquent\Model;

class OperationMeasure extends Model
{

    protected $table = "operation_type_measure";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order', 'min', 'max', 'operation_type_id'];


}
