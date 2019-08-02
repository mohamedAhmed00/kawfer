<?php

namespace App\Modules\Schedule\Model;

use App\Modules\Operation\Model\Operation;
use App\Modules\User\Model\User;
use App\Modules\Worker\Model\Worker;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['operation_date', 'high_discount', 'status', 'total', 'client_id', 'worker_id', 'operation_id', 'operation_discount_id', 'operation_type_measure_id'];

    /**
     * @author Nader Ahmed
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Client()
    {
        return $this->belongsTo(User::class,'client_id','id');
    }

    /**
     * @author Nader Ahmed
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Worker()
    {
        return $this->belongsTo(Worker::class,'worker_id','id');
    }

    /**
     * @author Nader Ahmed
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Operation()
    {
        return $this->belongsTo(Operation::class,'operation_id','id');
    }

}
