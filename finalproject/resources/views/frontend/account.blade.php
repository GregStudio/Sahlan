@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Akun</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('account.update') }}" class="checkout__form" method="POST">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="checkout__form__input">
                        <p>Nama</p>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="checkout__form__input">
                        <p>Nomor Telepon</p>
                        <input type="text" name="phone_number" value="{{ auth()->user()->phone_number }}" required>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="checkout__form__input">
                        <p>Alamat</p>
                        <input type="text" name="address" value="{{ auth()->user()->address }}" required>
                    </div>
                </div>

                <div class="text-md-right">
                    <a href="{{ Route('home') }}" class="btn btn-secondary " href="#">Batal</a>
                    <button type="submit" class="btn btn-primary " href="#">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
