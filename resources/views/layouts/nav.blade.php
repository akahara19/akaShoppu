<style>
    .accent {
        background: linear-gradient(130deg, #3686bb, #a834f5);
    }

    .btn {
        stroke: greenyellow;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark accent mb-5 fixed-top shadow">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo/aka.png') }}" alt="" width="230" class=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @guest
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    @endguest
                </li>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.produk') }}" class="nav-link">Produk</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer.summary') }}">Summary</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    @guest
                        <a class="btn border text-white" href="{{ route('showLogin') }}">Login</a>
                    @endguest
                </li>
                @auth
                    <li class="nav-item">
                        <a class="btn border text-white" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
