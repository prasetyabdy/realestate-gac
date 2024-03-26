{{-- Navbar --}}
<nav class="navbar navbar-expand-lg py-2 fixed-top scroll-nav-active">
    <div class="container ">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/icons/ic-gac.png') }}" height="65" width="65" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Beranda</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Perumahan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach (DB::table('categories')->get() as $perumahan)
                <li><a class="dropdown-item"
                    href="/properti/{{ $perumahan->id }}">{{ $perumahan->nama }}</a></li>
                    @endforeach
                    
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/service">Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gallery">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tentang">Tentang</a>
            </li>
            
        </ul>

        <ul class="navbar-nav d-flex">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi , {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                        <a href="/dashboard" class="dropdown-item">Riwayat Pesanan</a>
                        <a href="" class="dropdown-item">Riwayat Booking</a>
                        
                        <a href="" class="dropdown-item">
                            <form action="/logout" method="POST">
                                @csrf
                               <button type="submit" class="btn btn-transparent">Logout</button>
                            </form>
                        </a>
                
                    </ul>
                </li>
            @else
                <a href="/login" class="btn btn-primary">Daftar</a>
            @endauth
            </ul>
    </div>
</div>
</nav>

{{-- Navbar --}}
