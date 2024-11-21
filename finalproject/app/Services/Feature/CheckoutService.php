<?php
namespace App\Services\Feature;

use App\Mail\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\CrudRepositories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutService
{

    protected $order, $orderDetail;
    protected $cartService;
    public function __construct(Order $order, OrderDetail $orderDetail, CartService $cartService)
    {
        $this->order = new CrudRepositories($order);
        $this->orderDetail = new CrudRepositories($orderDetail);
        $this->cartService = $cartService;
    }

    public function process($request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $userCart = $this->cartService->getUserCart();
        $subtotal = $userCart->sum('total_price_per_product');
        $total_pay = $subtotal + $request['shipping_cost'];
        foreach ($userCart as $cart) {
            $invoice_number = $cart->id . auth()->user()->id . date("Ymd");
            $dataOrder = [
                'invoice_number' => $invoice_number,
                'total_pay' => $total_pay,
                'recipient_name' => $request['recipient_name'],
                'phone_number' => $request['phone_number'],
                'destination' => $request['city_id'] . ', ' . $request['province_id'],
                'address_detail' => $request['address_detail'],
                'courier' => $request['courier'],
                'subtotal' => $subtotal,
                'shipping_cost' => $request['shipping_cost'],
                'shipping_method' => $request['shipping_method'],
                'total_weight' => $request['total_weight'],
                'status' => 0,
                'user_id' => auth()->user()->id
            ];
        }
        $orderStore = $this->order->store($dataOrder);
        foreach ($userCart as $cart) {
            $this->orderDetail->store([
                'order_id' => $orderStore->id,
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'qty' => $cart->qty
            ]);
        }
        $data['order'] = Order::where('id', $cart->id)->first();
        Mail::to(Auth::user()->email)->send(new Invoice($data));
        $this->cartService->deleteUserCart();
        return $invoice_number;
    }
    
    public function offlineProcess($request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $userCart = $this->cartService->getUserCart();
        $subtotal = $userCart->sum('total_price_per_product');
        $total_pay = $subtotal;
        foreach ($userCart as $cart) {
            $invoice_number = $cart->id . auth()->user()->id . date("Ymd");
            $dataOrder = [
                'invoice_number' => $invoice_number,
                'total_pay' => $total_pay,
                'recipient_name' => auth()->user()->name,
                'phone_number' => "offline",
                'destination' => "offline",
                'address_detail' => "offline",
                'courier' => "offline",
                'subtotal' => $subtotal,
                'shipping_cost' => "offline",
                'shipping_method' => "offline",
                'total_weight' => "offline",
                'status' => 6,
                'user_id' => auth()->user()->id
            ];
        }
        $orderStore = $this->order->store($dataOrder);
        foreach ($userCart as $cart) {
            $this->orderDetail->store([
                'order_id' => $orderStore->id,
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'qty' => $cart->qty
            ]);
        }
        $data['order'] = Order::where('id', $cart->id)->first();
        Mail::to(Auth::user()->email)->send(new Invoice($data));
        $this->cartService->deleteUserCart();
        return $invoice_number;
    }
}
