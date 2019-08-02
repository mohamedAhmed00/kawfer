<?php
namespace App\Modules\Product\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Product\Repository\Interfaces\ProductInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getExpiredProduct()
    {
        return  DB::select( DB::raw("SELECT * from `products` where min_quantity_available > quantity") );
    }

    /**
     * @author Nader Ahmed
     * @return mixed
     */
    public function getAllWithExpireField()
    {
        return DB::select( DB::raw("SELECT `id`, `name`, `image`, `quantity`, `min_quantity_available`, `actual_price`, `final_price`, `description`, `category_id`, `created_at`, `updated_at` , (quantity > min_quantity_available ) as expire from `products`") );
    }
}
