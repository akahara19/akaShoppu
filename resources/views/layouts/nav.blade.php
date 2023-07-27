<style>
    .accent{
        background: linear-gradient(130deg, #3686bb, #a834f5);
    }

    .btn{
        stroke: greenyellow;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark accent mb-5">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="/">akaShoppu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"> 
                    <a class="btn border text-white" href="{{ route('showLogin') }}">Login</a>
                </li>
                <li class="nav-item"> 
                    <a class="btn border text-white" href="">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
