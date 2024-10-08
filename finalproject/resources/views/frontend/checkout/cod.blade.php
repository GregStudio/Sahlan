@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Proses</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('checkout.codProcess') }}" class="checkout__form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <h5>Detail pembayaran</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Nama penerima <span>*</span></p>
                                    <input type="text" name="recipient_name" value="{{ auth()->user()->name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Nomor telepon <span>*</span></p>
                                    <input type="text" name="phone_number" value="{{ auth()->user()->phone_number }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Detail alamat <span>*</span></p>
                                    <input type="text" name="address_detail" value="{{ auth()->user()->address }}"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Pesanan anda</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Produk</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @foreach ($data['carts'] as $cart)
                                        <li>{{ $loop->iteration }}. {{ $cart->Product->name }} x
                                            {{ $cart->qty }}<span>{{ rupiah($cart->total_price_per_product) }}</span>
                                        </li>
                                    @endforeach
                                    <li>
                                        <span class="top__text">Berat total</span>
                                        <span
                                            class="top__text__right">{{ $data['carts']->sum('total_weight_per_product') / 1000 }}
                                            Kg</span>
                                        <input type="hidden" name="total_weight" id="total_weight"
                                            value="{{ $data['carts']->sum('total_weight_per_product') }}">
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Subtotal <span>{{ rupiah($data['carts']->sum('total_price_per_product')) }}</span>
                                    </li>
                                    <li>Biaya pengiriman <span id="text-cost">Rp 20.000</span></li>
                                    <li>Total <span
                                            id="total">{{ rupiah($data['carts']->sum('total_price_per_product') + 20000) }}</span>
                                    </li>
                                    <input type="hidden" name="shipping_cost" id="shipping_cost">
                                </ul>
                            </div>
                            <button type="submit" class="site-btn">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
