@extends('layouts.layouts')

@section('content')


<section style="margin-top: 100px">
    <div class="container py-5">
        <h3 class="fw-bold mb-3">Halaman Client</h3>
        
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        
        <table class="table table-bordered table-striped">
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
                    <td>Rp.{{ number_format($pesanan->rumah->hargarumah) }}</td>
                    <td>
                        @if ($pesanan->jml_pembayaran)
                            {{ $pesanan->jml_pembayaran }}
                        @else
                             Rp.0
                        @endif
                    </td>
                    <td>{{ $pesanan->created_at }}</td>
                    <td>{{ $pesanan->janji_temu }}</td>
                    <td>{{ $pesanan->jenis_pembayaran }}</td>
                    <td>
                        
                        @if ($pesanan->bukti_pembayaran)
                        @if ($pesanan->status > 0)
                        <div class="alert alert-success">Pembayaran Terkonfirmasi</div>
                        @else
                        <div class="alert alert-danger">Menunggu Konfirmasi Admin</div>
                        @endif
                        @endif
                        
                        @if (!$pesanan->bukti_pembayaran)
                        <a href="{{ route('upbuktipesanan', ['id' => $pesanan->id]) }}" class="btn btn-primary"> 
                            Silahkan Upload Pembayaran DP Sebelum
                            {{ \Carbon\Carbon::createFromDate($pesanan->janji_temu)->addDays(12)->format('d M Y') }}
                        </a>
                        @endif
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
