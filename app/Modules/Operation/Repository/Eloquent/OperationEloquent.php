<?php
namespace App\Modules\Operation\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Operation\Repository\Interfaces\OperationInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OperationEloquent extends BaseEloquent implements OperationInterface
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
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getWithTypes() {
        return $this->model->with('types');
    }

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date)
    {
        return DB::select( DB::raw(" SELECT COUNT(*) as count , COALESCE(SUM(total),0) AS total FROM schedules WHERE status = 'finished' and  created_at between '" . $date[0] . "' and '" . $date[1] . "'"));
    }
}
