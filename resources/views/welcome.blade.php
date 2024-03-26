
@extends('layouts.layouts')

@section('content')
<section id="hero" class="">
    <div class="container text-center text-white">
        <div class="hero-title">
            <div class="hero-text" data-aos="fade-right">Selamat Datang <br> Di Graha Cemerlang</div>
            <h4 data-aos="fade-left">Perusahaan Realestate Terpercaya</h4>
        </div>
    </div>
</section>

<section id="program" style="margin: -30px" data-aos="fade-up" class="align-items-center">
    <div class="container col-xxl-8">
        <div class="row">
            <div class="col-lg-3 col-md-6 col mb-2">
            </div>
            <div class="col-lg-3 col-md-6 col mb-2">
                <div class="bg-white rounded-4 shadow p-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">100+</h3>
                        <p>Terjual</p>
                    </div>
                    <img src="{{ asset('assets/icons/home.png') }}" height="55" width="55" alt="">
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col mb-2">
                <div class="bg-white rounded-4 shadow p-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold">50+</h3>
                        <p>Pengguna</p>
                    </div>
                    <img src="{{ asset('assets/icons/users.png') }}" height="55" width="55" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col mb-2">
            </div>
 
           
        </div>
    </div>
</section>

{{-- About Us --}}
<section id="join" class="py-5">
    <div class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="d-flex align-items-center mb-3">
                    <div class="stripe me-2"></div>
                    <h5>Graha Cemerlang</h5>
                </div>
                <h1 class="fw-bold mb-2">Wujudkan Rumah Impianmu</h1>
                <p class="mb-3">Graha Cemerlang merupakan salah satu perusahaan realestate terbaik dikabupaten Maros, dengan harga yang bersahabat fasilitas lengkap, dan daerah yang strategis. </p>
                <button class="btn btn-outline-primary">Daftar</button>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('assets/images/join.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
{{-- About Us --}}

{{-- Properti --}}
<section id="properti" class="mb-5">
    <div class="container ">
        
        <div class="text-center mb-5">
            <div class="stripe-hitam"></div>
        </div>
        
        <div class="row py-5" data-aos="fade-up">
           @foreach ($data as $d)
            <div class="col-lg-4">
                <div class="card border-0">
                    <img src="{{ asset('storage/foto-rumah/' . $d->foto) }}" class="img-fluid mb-3" alt="">
                    <div class="konten-berita">
                        <p class="mb-2 text-secondary">{{ $d->namarumah }}</p>
                        <div>
                            <h5 class="fw-bold mb-2" style="color: #000000bd">Rp.{{number_format($d->hargarumah) }}</h5>
                        </div>
                        <p class="text-secondary">
                            <img src="{{ asset('assets/icons/garage-car.svg') }}" width="15px" height="15px" alt=""> {{ $d->garasi }}
                            &nbsp; <img src="{{ asset('assets/icons/bed.svg') }}" width="15px" height="15px" alt=""> {{ $d->kamartidur }}
                            &nbsp;  <img src="{{ asset('assets/icons/toilet.svg') }}" width="15px" height="15px" alt=""> {{ $d->kamarmandi }}
                        </p>
                        <a href="{{ route('properti.detail', ['id' => $d->id]) }}" class="text-decoration-none text-danger">Detail</a>
                    </div>
                </div>
            </div>        
           @endforeach 
            
        </div>
        
        <div class="footer-berita text-center">
            <a href="" class="btn btn-outline-primary">Rumah Lainnya >></a>
        </div>
        
    </div>
</section>
{{-- Properti --}}

{{-- Keunggulan --}}
<div class=" mt-5">
    <div class="stripe-hitam"></div>
</div>
<section id="foto" class="section-foto parallax">
    <div class="container">
        
        <div class="text-center mb-5" data-aos="fade-left">
            <h5 class="fw-bold text-white">Keuntungan Memilih Kami</h5>
            <div class="stripe-putih"></div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-down"> 
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.3.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Lokasi Strategis</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-down">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.2.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Harga Bersahabat</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-down">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.1.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Keamanan 24/7</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-down">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.8.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Transportasi Mudah</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-up">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.5.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Fasilitas Lengkap</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-up">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.4.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Tanggung Jawab</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-up">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.7.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Bebas Banjir</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col mb-2" data-aos="fade-up">
                <div class="bg-transparent text-center">
                    <img src="{{ asset('assets/icons/1.6.png') }}" height="50" width="50" alt="">
                    <div>
                        <br><p style="color: rgb(255, 255, 255)">Sertifikat Hak Milik</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
{{-- Keunggulan --}}

{{-- Video --}}
<div class="">
    <div class="stripe-hitam"></div>
</div>
<section id="video" class="py-5">
    <div class="container py-5">
        <div class="text-center" data-aos="fade-left">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/OMyhve_lmp4?si=-YDRUoIkkPUsWBk9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</section>
{{-- Video --}}

<div class="">
    <div class="stripe-hitam"></div>
</div>
<section class="mt-3 mb-3">
    <div class="container">
        <div class="" data-aos="fade-left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.33817936476!2d119.5505799!3d-5.048810199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbef9714e026c17%3A0xe4b5100794d40869!2sNew%20City%20Graha%20Cemerlang!5e0!3m2!1sid!2sid!4v1710605877363!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

@endsection



