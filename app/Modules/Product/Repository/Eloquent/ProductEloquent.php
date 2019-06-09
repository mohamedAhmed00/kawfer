<?php
namespace App\Modules\Product\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Product\Repository\Interfaces\ProductInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ProductEloquent extends BaseEloquent implements ProductInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * ProductEloquent constructor.
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
