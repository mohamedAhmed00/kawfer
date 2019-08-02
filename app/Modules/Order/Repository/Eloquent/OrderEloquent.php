<?php
namespace App\Modules\Order\Repository\Eloquent;
use App\Generic\Repository\Eloquent\BaseEloquent;
use App\Modules\Order\Repository\Interfaces\OrderInterface;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderEloquent extends BaseEloquent implements OrderInterface
{
    /**
     * @var
     */
    protected $model;

    /**
     * OrderEloquent constructor.
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
    public function parts()
    {
        return $this->model->where('slug' ,'!=','client')->get();
    }

    /**
     * @param int $product_id
     * @param int $order_id
     * @param int $quantity
     * @auther Nader Ahmed
     * @return mixed
     */
    public function attachOrder(int $product_id,int $order_id,int $quantity)
    {
        DB::table('product_orders')->insert(
            ['order_id' => $order_id, 'product_id' => $product_id,'quantity' => $quantity]
        );
    }

    /**
     * @param array $date
     * @author Nader Ahmed
     * @return mixed
     */
    public function getReport(array $date)
    {
        return DB::select( DB::raw(" SELECT COUNT(*) as count , COALESCE(SUM(total),0) AS total , (SELECT COALESCE(SUM(actual_price),0) FROM `products` 
 INNER JOIN product_orders on product_orders.product_id = products.id INNER JOIN orders ON product_orders.order_id= orders.id where orders.created_at between '" . $date[0] . "' and '" . $date[1] . "') as
  actaul_price FROM orders WHERE created_at between '" . $date[0] . "' and '" . $date[1] . "'"));
    }

    /**
     * @author Nader Ahmed
     * @return Mixed
     */
    public function getAllUser()
    {
        return $this->model->with('User')->get();
    }
}
