<?php
namespace App\Modules\Discount\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Discount\Repository\Interfaces\DiscountInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiscountEloquent extends BaseEloquent implements DiscountInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * DiscountEloquent constructor.
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
    public function getExpiredDiscount()
    {
        $results = DB::select( DB::raw("SELECT * from `discounts` where (abs(DATEDIFF(`passport_expiration_age`,date(now()))) < 60  OR
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
    abs(DATEDIFF(`national_expiration_age`,date(now()))) < 60)  as expire from `discounts`") );
    }
}

