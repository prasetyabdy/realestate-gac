@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 100px">
        <div class="container py-5">
            <h3 class="fw-bold mb-3">Halaman Client</h3>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama Rumah</th>
                        <th>Harga</th>
                        <th>Jumlah Dibayarkan</th>
                        <th>Tanggal</th>
                        <th>Janji Temu</th>
                        <th>Jenis Pembayaran</th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesananPesanan as $pesanan)
                        <tr>
                            <td>{{ $pesanan->rumah->namarumah }}</td>
                            <td>{{ $pesanan->rumah->hargarumah }}</td>
                            <td></td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->janji_temu }}</td>
                            <td>{{ $pesanan->jenis_pembayaran }}</td>
                            <td>
                                @if ($pesanan->bukti_pembayaran)
                                    Menunggu Konfirmasi Admin
                                @endif

                                @if (!$pesanan->bukti_pembayaran)
                                    Silahkan Upload Pembayaran DP Sebelum
                                    {{ \Carbon\Carbon::createFromDate($pesanan->janji_temu)->addDays(12)->format('d M Y') }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
