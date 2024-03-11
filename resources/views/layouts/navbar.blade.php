{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-2 fixed-top scroll-nav-active">
    <div class="container ">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/icons/ic-gac.png') }}" height="65" width="65" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="/properti">Properti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="#">Kontak</a>
                </li>   
            </ul>
            <div class="d-flex">
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">Logout</button>
                    </form>
                @else
                   <a href="/login" class="btn btn-primary">Masuk</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<div class="stripe-hitam"></div>
{{-- Navbar --}}