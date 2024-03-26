@extends('layouts.layouts')

@section('content')
    <section id="detail" style="margin-top:100px" class="py-5">
        <div class="container col-xxl-8">
            
            <img src="{{ asset('storage/foto-rumah/' . $rumah->foto) }}" class="img-fluid mb-3" alt="">
            <div class="konten-properti">
                <h4 class="fw-bold mb-3">{{ $rumah->namarumah }}</h4>
                <p class="mb-3 text-secondary">Tipe Rumah : {{ $rumah->tiperumah }} | Harga : Rp. {{ number_format($rumah->hargarumah)   }}</p>
                <h5 class="fw-bold mt-5">Deskripsi : </h5>
                <p>{!! $rumah->deskripsirumah !!}</p>
                <h5 class="fw-bold mt-5">Alamat : </h5>
                {!! $rumah->alamatrumah !!}

            </div>
            <a href="{{ route('pesanan', $rumah->id) }}" class="btn btn-primary mt-3">Pesan Sekarang</a>
            <button class="btn btn-primary mt-3">Booking</button>

            <div>
                <div class="stripe-hitam mt-5"></div>
                <h4 class="fw-bold mt-5" style="text-align: center">Form Simulasi KPR</h4>

                <form action="" method="GET">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Kredit</label>
                        <input type="number" name="pinjaman" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ request()->pinjaman }}">

                        @error('')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jangka Waktu (Tahun)</label>
                        <input type="number" name="jangka_waktu" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ request('jangka_waktu') }}">

                        @error('')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bunga Pertahun</label>
                        <input type="double" name="bunga" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ request('bunga') }}">

                        @error('')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Jenis KPR</label>

                        <select name="type" class="form-control">
                            <option>--Pilih--</option>
                            <option value="flat" @selected(request('type') === 'flat')>Flat</option>
                            <option value="efektif" @selected(request('type') === 'efektif')>Efektif</option>
                            <option value="anuitas" @selected(request('type') === 'anuitas')>Anuitas</option>
                        </select>
                        @error('')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>
            </div>

            <div>
                <div class="stripe-hitam mt-5"></div>
                <h4 class="fw-bold mt-5" style="text-align: center">Hasil Simulasi KPR</h4>
                @if (request()->has('pinjaman'))
                    <h2>Hasil : </h2>
                    @if (request()->type === 'flat')
                        <b>Flat </b> <br>
                        Jangka Waktu : {{ $rekapitulasi['flat']['jangkaWaktu'] }} Bulan <br>
                        Pinjaman : Rp.{{ number_format($rekapitulasi['flat']['pinjaman']) }} <br>
                        Bunga : Rp.{{ number_format($rekapitulasi['flat']['totalBunga']) }} <br>
                        Total Pinjaman : Rp. {{number_format($rekapitulasi['flat']['totalPinjaman']) }} <br>
                        Cicilan per bulan : Rp.{{ number_format($hasil) }}

                        <table class="table table-striped mt-5 table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Angsuran</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapitulasi['flat']['data'] as $data)
                                    <tr>
                                        <td>Bulan ke-{{ $data['bulan'] }}</td>
                                        <td>{{ number_format($data['pokok']) }}</td>
                                        <td>{{ number_format($data['bunga']) }}</td>
                                        <td>{{ number_format($data['cicilan']) }}</td>
                                        <td>{{ number_format($data['sisa']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if (request()->type === 'efektif')
                        <b>Efektif </b> <br>
                        Jumlah Pinjaman : Rp. {{ number_format($rekapitulasi['efektif']['pinjaman']) }}<br>
                        Waktu Tenor : {{ $rekapitulasi['efektif']['waktuTenor'] }} Bulan<br>
                        Bunga Efektif : Rp. {{ number_format($rekapitulasi['efektif']['bungaEfektif']) }} % <br>


                        <table class="table table-striped mt-5 table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Angsuran</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapitulasi['efektif']['data'] as $data)
                                    <tr>
                                        <td>Bulan ke-{{ $data['bulan'] }}</td>
                                        <td>{{ number_format($data['cicilanPokokPerbulan']) }}</td>
                                        <td>{{ number_format($data['cicilanBunga']) }}</td>
                                        <td>{{ number_format($data['cicilan']) }}</td>
                                        <td>{{ number_format($data['sisa']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if (request()->type === 'anuitas')
                        <b>Anuitas </b> <br>
                        Jumlah Pinjaman : Rp.{{ number_format($rekapitulasi['anuitas']['pinjaman']) }}<br>
                        Waktu Tenor : {{ $rekapitulasi['anuitas']['waktuTenor'] }} Bulan<br>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Pokok</th>
                                    <th>Bunga</th>
                                    <th>Angsuran</th>
                                    <th>Sisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rekapitulasi['anuitas']['data'] as $data)
                                    <tr>
                                        <td>Bulan ke-{{ $data['bulan'] }}</td>
                                        <td>{{ number_format($data['pokok']) }}</td>
                                        <td>{{ number_format($data['bunga']) }}</td>
                                        <td>{{ number_format($data['pokokBunga']) }}</td>
                                        <td>{{ $data['sisaPokok'] < 0 ? '0' : number_format($data['sisaPokok']) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            </div>
        </div>

    </section>
@endsection
