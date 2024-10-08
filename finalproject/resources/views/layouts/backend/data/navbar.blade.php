<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifikasi
                </div>
                @php
                    use App\Models\Product;
                    $products = Product::where('stock', '<', 4)->get();
                @endphp
                <div class="dropdown-list-content dropdown-list-icons">
                    @foreach ($products as $product)
                        <a href="{{ route('admin.product.show', ['id' => $product->id]) }}"
                            class="dropdown-item dropdown-item-unread">
                            <img class="dropdown-item-icon bg-primary text-white"
                                src="{{ asset('storage/' . $product->thumbnails) }}">
                            <div class="dropdown-item-desc">
                                {{ $product->name }}
                                <div class="time text-primary">Stok: {{ $product->stock }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ route('admin.product.index') }}">Ke halaman produk <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('stisla') }}/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hai, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
