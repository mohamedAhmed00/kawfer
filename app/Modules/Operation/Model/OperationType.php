<?php

namespace App\Modules\Operation\Model;

use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','operation_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function measures(){
        return $this->hasMany(OperationMeasure::class,'operation_type_id','id');
    }
}
