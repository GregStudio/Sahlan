<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use App\Services\Feature\CartService;
use App\Services\Feature\CheckoutService;
use App\Services\Rajaongkir\RajaongkirService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $rajaongkirService,$checkoutService,$cartService;
    public function __construct(RajaongkirService $rajaongkirService,CheckoutService $checkoutService,CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->rajaongkirService = $rajaongkirService;
        $this->checkoutService = $checkoutService;
    }

    public function index()
    {
        $data['carts'] = $this->cartService->getUserCart();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        $data['shipping_address'] = ShippingAddress::first();
        return view('frontend.checkout.index',compact('data'));
    }

    public function cod()
    {
        $data['carts'] = $this->cartService->getUserCart();
        $data['provinces'] = $this->rajaongkirService->getProvince();
        $data['shipping_address'] = ShippingAddress::first();
        return view('frontend.checkout.cod',compact('data'));
    }

    public function process(Request $request)
    {
        $invoice_number = $this->checkoutService->process($request->all());
        return redirect()->route('transaction.show', $invoice_number)->with('success',__('message.order_success'));
    }

    public function codProcess(Request $request)
    {
        $invoice_number = $this->checkoutService->codProcess($request->all());
        return redirect()->route('transaction.show', $invoice_number)->with('success',__('message.order_success'));
    }

    public function offlineProcess(Request $request)
    {
        $invoice_number = $this->checkoutService->offlineProcess($request->all());
        return redirect()->route('transaction.show', $invoice_number)->with('success',__('message.order_success'));
    }
}
