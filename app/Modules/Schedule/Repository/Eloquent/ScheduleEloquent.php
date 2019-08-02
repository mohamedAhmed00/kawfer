<?php
namespace App\Modules\Schedule\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Schedule\Repository\Interfaces\ScheduleInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ScheduleEloquent extends BaseEloquent implements ScheduleInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * ScheduleEloquent constructor.
     * @param Model $model
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }

    /**
     * @param string $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getWithRelatedData(string $date)
    {
        return $this->model->with(['client','worker','operation'])->where('operation_date' , $date)->get();
    }
}

