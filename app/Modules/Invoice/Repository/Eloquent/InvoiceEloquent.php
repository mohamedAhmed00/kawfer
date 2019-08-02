<?php
namespace App\Modules\Invoice\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Invoice\Repository\Interfaces\InvoiceInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvoiceEloquent extends BaseEloquent implements InvoiceInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * InvoiceEloquent constructor.
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

