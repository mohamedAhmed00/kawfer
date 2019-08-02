<?php
namespace App\Modules\Client\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Client\Repository\Interfaces\ClientInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ClientEloquent extends BaseEloquent implements ClientInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * ClientEloquent constructor.
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
