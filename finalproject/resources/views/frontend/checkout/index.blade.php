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
            <form action="{{ route('checkout.process') }}" class="checkout__form" method="POST">
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
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Provinsi <span>*</span></p>
                                    <select name="province_id" id="province_id" class="select-2" required>
                                        <option value="" selected disabled>-- Pilih provinsi --</option>
                                        @foreach ($data['provinces'] as $province)
                                            <option value="{{ $province['province'] }}"
                                                data-id="{{ $province['province_id'] }}">{{ $province['province'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Kota <span>*</span></p>
                                    <select name="city_id" id="city_id" class="select-2" disabled required>
                                        <option value="" selected disabled>-- Pilih kota --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Detail alamat <span>*</span></p>
                                    <input type="text" name="address_detail" value="{{ auth()->user()->address }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Kurir <span>*</span></p>
                                    <select name="courier" id="courier">
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Metode pengiriman <span>*</span></p>
                                    <select name="shipping_method" id="shipping_method" required>
                                    </select>
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
                                    <li>Biaya pengiriman <span id="text-cost">Rp 0</span></li>
                                    <li>Total <span
                                            id="total">{{ rupiah($data['carts']->sum('total_price_per_product')) }}</span>
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
@push('js')
    <script>
        function checkCost() {
            var origin = '{{ $data['shipping_address']->city_id }}';
            var destination = $('#city_id option:selected').data('id');
            var weight = "{{ $data['carts']->sum('total_weight_per_product') }}";
            var courier = $('#courier option:selected').val();

            let _url = `/rajaongkir/cost`;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    origin: origin,
                    destination: destination,
                    weight: weight,
                    courier: courier,
                    _token: _token
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        $('#shipping_method').empty();
                        $('#shipping_method').append(
                            'option value="" selected disabled>-- Select Shipment Service --</option>');
                        $.each(response[0].costs, function(key, cost) {
                            $('select[name="shipping_method"]').append('<option value="' + cost
                                .service + ' Rp.' + cost.cost[0].value + ' Estimasi ' +
                                cost.cost[0].etd +
                                '" data-ongkir="' + cost.cost[0].value + '">' + cost.service +
                                ' Rp.' + cost.cost[0].value + ' Estimasi ' +
                                cost.cost[0].etd +
                                '</option>');
                            if (key == 0) {
                                countCost(cost.cost[0].value)
                            }
                        });
                    } else {
                        $('#shipping_method').append(
                            'option value="" selected disabled>-- Select Shipment Service --</option>');
                    }
                },
            });
        }

        $('#province_id').on('change', function() {
            var provinceId = $('#province_id option:selected').data('id');
            $('#city_id').empty();
            $('#city_id').append('<option value="">-- Loading Data --</option>');
            $.ajax({
                url: '/rajaongkir/province/' + provinceId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#city_id').empty();
                        $('#city_id').removeAttr('disabled');
                        $('select[name="city_id"]').append(
                            'option value="" selected>-- Select City --</option>');
                        $.each(data, function(key, city) {
                            $('select[name="city_id"]').append('<option value="' + city
                                .city_name + '" data-id="' + city.city_id + '">' + city
                                .type + ' ' + city.city_name +
                                '</option>');
                        });
                        checkCost();
                    } else {
                        $('#city_id').empty();
                    }
                }
            });
        });

        $('#city_id').on('change', function() {
            checkCost();
        });
        $('#courier').on('change', function() {
            checkCost();
        });

        $('#shipping_method').on('change', function() {
            var ongkir = parseInt($('#shipping_method option:selected').data('ongkir'));
            countCost(ongkir);
        })

        function countCost(ongkir) {
            var subtotal = `{{ $data['carts']->sum('total_price_per_product') }}`;
            var total = parseInt(subtotal) + ongkir;
            $('#text-cost').text(rupiah(ongkir));
            $('#shipping_cost').val(ongkir);
            $('#total').text(rupiah(total))
        }
    </script>
@endpush
