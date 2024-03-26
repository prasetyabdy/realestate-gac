@extends('layouts.layouts')

@section('content')
    {{-- Berita --}}
    <section id="berita" style="margin-top: 50px" class="py-5">
        <div class="container py-5">

            <div class="header-berita text-center">
                <h2 class="fw-bold" style="color: #1d7ce1">Tentang PT.GAC</h2>
                <div class="stripe-hitam mt-5"></div>
            </div>

            <div class="row py-5">
                <div class="">
                    <div class="card border-0">

                        <img src="{{ asset('assets/images/bg-video.jpg') }}"  alt="">
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- Berita --}}
@endsection
