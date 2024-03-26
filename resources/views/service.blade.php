@extends('layouts.layouts')

@section('content')
    {{-- Berita --}}
    <section id="berita" style="margin-top: 50px" class="py-5">
        <div class="container py-5">

            <div class="header-berita text-center">
                <h2 class="fw-bold" style="color: #1d7ce1" data-aos="fade-right">Service</h2>
                <div class="stripe-hitam mt-5"></div>
            </div>

            <div class="row py-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.3.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Lokasi Strategis</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-down">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.2.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Harga Bersahabat</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.1.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Keamanan 24/7</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3" data-aos="fade-right">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.8.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Transportasi Mudah</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3" data-aos="fade-up">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.5.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Fasilitas Lengkap</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3" data-aos="fade-left">
                    <div class="card border-0  text-center">
                        <div class="center">
                        <img src="{{ asset('assets/icons/1.4.png') }}" height="150" width="150" alt="">
                        </div>
                        <div>
                            <h6 class="fw-bold">Tanggung Jawab</h6>
                            <p class="text-secondary">  Lokasi strategis dekat <br>dengan mall dan bandara</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    {{-- Berita --}}
@endsection
