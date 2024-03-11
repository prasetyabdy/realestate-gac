@extends('layouts.layouts')

@section('content')
    {{-- Berita --}}
    <section id="berita" style="margin-top: 100px" class="py-5">
        <div class="container py-5">

            <div class="header-berita text-center">
                <h2 class="fw-bold">Perumahan {{ $category->nama }}</h2>
            </div>

            <div class="row py-5">
                @foreach ($category->rumahRumah as $d)
                    <div class="col-lg-4">
                        <div class="card border-0">
                            <img src="{{ asset('storage/foto-rumah/' . $d->foto) }}" class="img-fluid mb-3" alt="">
                            <div class="konten-berita">
                                <p class="mb-3 text-secondary">Tipe Rumah : {{ $d->tiperumah }}</p>
                                <h4 class="fw-bold mb-3">{{ $d->namarumah }}</h4>
                                <p class="text-secondary">Rp. {{ number_format($d->hargarumah) }}</p>
                                <a href="{{ route('properti.detail', ['id' => $d->id]) }}"
                                    class="text-decoration-none text-danger">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- Berita --}}
@endsection
