<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="{{ asset('assets/icons/ic-gac.png') }}">
    <title>Graha Cemerlang </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    
    {{-- Navbar --}}
    @include('layouts.navbar')
    
    {{-- Content --}}
    @yield('content')
    
    
    {{-- Footer --}}
    <div class="stripe-hitam mb-5"></div>
    <section id="footer" class="bg-white">
        <div class="container py-0">
            <footer>
                <div class="row">
                    {{-- Kolom 1 Navigasi --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <div class="d-flex">
                            <ul class="nav flex-column me-5">
                                <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Berita Realestate</a></li>
                                
                                <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Kegiatan Realestate</a></li>
                                
                                <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Gallery Realestate</a></li>
                                
                                <li class="nav-item mb-2"><a href="" class="nav-link p-0 text-muted">Kegiatan SRealestate</a></li>
                            </ul>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Alumni</a></li>
                                
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Info PSB</a></li>
                                
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Prestasi</a></li>
                                
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Video Kegiatan</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    {{-- Kolom 2 Sosial Media --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Follow kami</h5>
                        <div class="d-flex mb-3">
                            <a href="" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{ asset('assets/icons/ig.png') }}" height="30" width="30" class="me-4" alt="">
                            </a>
                            <a href="" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{ asset('assets/icons/fb.png') }}" height="30" width="30" class="me-4" alt="">
                            </a>
                            <a href="" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{ asset('assets/icons/tiktok.png') }}" height="30" width="30" class="me-4" alt="">
                            </a>
                            <a href="" target="_blank" class="text-decoration-none text-dark">
                                <img src="{{ asset('assets/icons/yt.png') }}" height="30" width="30" class="me-4" alt="">
                            </a>
                        </div>
                    </div>
                    
                    {{-- Kolom 3 Kontak --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-inter fw-bold mb-3">Kontak kami</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">info@grahacemerlang.sch.id</a></li>
                            
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">021-xxx-xxx</a></li>
                            
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">021-xxx-xxx</a></li>
                            
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">021-xxx-xxx</a></li>
                        </ul>
                    </div>
                    
                    {{-- Kolom 4 Alamat --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-inter fw-bold mb-3">Alamat Perusahaan</h5>
                        <p>Jl. Poros Maros, No 115, Maros, Sulawesi Selatan.</p>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    
    <section class="bg-light border-top">
        <div class="container py-4">
            <div class="d-flex justify-content-between">
                <div>
                    PT Graha Cemerlang
                </div>
                <div class="d-flex">
                    <p class="me-4">Syarat & Ketentuan</p>
                    <p>
                        <a href="/Kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        const navbar = document.querySelector(".fixed-top");
        window.onscroll = () => {
            if (window.scrollY > 0) {
                //navbar.classList.add("scroll-nav-active");
                //navbar.classList.add("text-nav-active");
            } else {
               //s navbar.classList.remove("scroll-nav-active");
            }
        };
        // Animasi AOS
        AOS.init();
    </script>
</body>
</html>