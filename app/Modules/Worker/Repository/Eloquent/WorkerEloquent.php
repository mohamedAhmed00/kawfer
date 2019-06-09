<?php
namespace App\Modules\Worker\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Worker\Repository\Interfaces\WorkerInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class WorkerEloquent extends BaseEloquent implements WorkerInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * WorkerEloquent constructor.
     * @param Model $model
     * @author Nader Ahmed
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }
}
