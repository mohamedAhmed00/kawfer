<?php

namespace App\Modules\Operation\Model;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function types(){
        return $this->hasMany(OperationType::class,'operation_id','id')->with('measures');
    }
}
