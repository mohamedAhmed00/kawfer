<?php
namespace App\Modules\Operation\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationMeasureInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class OperationMeasureEloquent extends BaseEloquent implements OperationMeasureInterface
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
}
