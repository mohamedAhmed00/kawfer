<?php
namespace App\Modules\Client\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Client\Repository\Interfaces\ProfileInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ProfileEloquent extends BaseEloquent implements ProfileInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * ProfileEloquent constructor.
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
