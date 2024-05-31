<?php
namespace App\Services\Feature;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Repositories\CrudRepositories;

class OrderAcceptService{

    protected $order,$ordeDetail,$product;
    public function __construct(Order $order,OrderDetail $orderDetail,Product $product)
    {
        $this->order = new CrudRepositories($order);
        $this->orderDetail = new CrudRepositories($orderDetail);
        $this->product = new CrudRepositories($product);
    }

    public function process($request)
    {
        $orders = $this->orderDetail->Query()->where('order_id','=',$request)->get();
        foreach ($orders as $order){
            $cek = $this->product->Query()->where(['id' => $order->product_id])->first();
            $cek->stock = $cek->stock - $order->qty;
            $cek->update();
        }
    }

}
