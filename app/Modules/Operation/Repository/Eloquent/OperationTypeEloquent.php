<?php
namespace App\Modules\Operation\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationTypeInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class OperationTypeEloquent extends BaseEloquent implements OperationTypeInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * OperationEloquent constructor.
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
     * @param int $id
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithMeasures(int $id)
    {
        return $this->model->with('measures')->where(['operation_id' => $id])->get();
    }
}
