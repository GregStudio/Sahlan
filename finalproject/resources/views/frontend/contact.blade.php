@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.0125780219605!2d121.91985237530471!3d-8.784885891267049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dad43cecf64bd0d%3A0x641cab856159b971!2sWolowaru%20-%20Lianunu%2C%20Liabeke%2C%20Kec.%20Lio%20Tim.%2C%20Kabupaten%20Ende%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sen!2sid!4v1715912702141!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="col-lg-4 col-md-4 col-sm-4 p-0 ">
                    <div class="categories__item">
                        <div class="categories__text">
                            <h4>Larisa Shop</h4>
                            <p>Jl. Wolowaru - Lianunu, Kabupaten Ende, Nusa Tenggara Timur</p>
                            <p>0819 9845 4796</p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
        </div>
@endsection
