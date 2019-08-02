<?php
namespace App\Modules\Worker\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Worker\Repository\Interfaces\WorkerInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     * @param array $array
     * @author Nader Ahmed
     * @return mixed
     */
    public function storeImages(array $array)
    {
        return $this->store($array);
    }

    /**
     * @param array $array
     * @param int $id
     * @author Nader Ahmed
     * @return mixed
     */
    public function updateImages($array,$id)
    {
        return $this->update($id, $array);
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredWorker()
    {
        $results = DB::select( DB::raw("SELECT * from `workers` where (abs(DATEDIFF(`passport_expiration_age`,date(now()))) < 60  OR
    abs(DATEDIFF(`health_certificate_expiration_age`,date(now()))) < 60 OR
    abs(DATEDIFF(`national_expiration_age`,date(now()))) < 60)") );
        return $results;
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField()
    {
        return DB::select( DB::raw("SELECT *, ( abs(DATEDIFF(`passport_expiration_age`,date(now()))) < 60  OR
    abs(DATEDIFF(`health_certificate_expiration_age`,date(now()))) < 60 OR
    abs(DATEDIFF(`national_expiration_age`,date(now()))) < 60)  as expire from `workers`") );
    }

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date)
    {
        return DB::select( DB::raw(" SELECT ( SELECT workers.name from workers where workers.id = schedules.worker_id ) as name , COUNT(*) as count , COALESCE(SUM(total),0) AS total FROM schedules WHERE (status = 'finished' and created_at 
                between '" . $date[0] . "' and '" . $date[1] . "' ) group by worker_id"));

    }
}

