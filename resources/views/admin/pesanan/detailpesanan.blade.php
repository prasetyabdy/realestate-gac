@extends('admin.layouts.layouts')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pesanan </h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg- mb-2">
                                </div>
                                <div class="col-lg-6  mb-2">
                                    <div class="rounded-4 p-3 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="fw-bold">Pesanan</h4>
                                            <p>
                                                Tanggal Pesan : {{ $detailpesanan->created_at }}
                                                <br>Status Transaksi : {{ $detailpesanan->status }}
                                                <br>Total Harga : Rp.{{ number_format($detailpesanan->rumah->hargarumah) }}
                                                <br>Jumlah Dibayarkan : @if ($detailpesanan->jml_pembayaran)
                                                                                {{ $detailpesanan->jml_pembayaran }}
                                                                         @else
                                                                                     Rp.0
                                                                            @endif
                                            </p>
                                        </div>        
                                    </div>
                                </div>
                                
                                <div class="col-lg mb-2">
                                    <div class="rounded-4 p-3 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="fw-bold">Pelanggan</h4>
                                            <p>
                                                Nama : {{ $detailpesanan->user->name }}
                                                <br>Telepon : {{ $detailpesanan->user->telepon }}
                                                <br>Email : {{ $detailpesanan->user->email }}
                                                <br>Janji Temu : {{ $detailpesanan->janji_temu }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="">
                                <table class="table table-bordered">
                                    <thead>
                                       
                                        <tr>
                                            <th>Nama Rumah</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $detailpesanan->rumah->namarumah }}</td>
                                            <td>Rp. {{ number_format($detailpesanan->rumah->hargarumah) }}</td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        
                        
                        <!-- /.card -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pesanan </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                
                                <tbody>
                                    <tr>
                                        <td><b>Nama Lengkap</b></td>
                                        <td>{{ $detailpesanan->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{{ $detailpesanan->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>No. KTP/Identitas</b></td>
                                        <td>{{ $detailpesanan->no_identitas }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Telepon</b></td>
                                        <td>{{ $detailpesanan->user->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td>{{ $detailpesanan->user->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Waktu Pesanan</b></td>
                                        <td>{{ $detailpesanan->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>{{ $detailpesanan->status === 0 ? "Belum Dikonfirmasi" : "Konfirmasi" }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Pembayaran</b></td>
                                        <td>{{ $detailpesanan->jenis_pembayaran }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Janji Temu</b></td>
                                        <td>{{ $detailpesanan->janji_temu }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Dibayarkan</b></td>
                                        <td>
                                            @if ($detailpesanan->jml_pembayaran)
                                                {{ $detailpesanan->jml_pembayaran }}
                                            @else
                                                Rp.0
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Konfirmasi</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="" method="POST">
                                               
                                                <label>{{ $detailpesanan->tanggal_pembayaran }}</label>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="0">Belum Dikonfirmasi</option>
                                                        <option value="1">Konfirmasi</option>
                                                    </select>
                                                    @error('category_id')
                                                    <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Jumlah Pembayaran</label>
                                                    <input type="text" name="jml_pembayaran" class="form-control" placeholder="Enter ...">
                                                    @error('nama')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->  
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Bukti Pembayaran</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div><img src="{{ asset('storage/foto-bukti-pembayaran/'.$detailpesanan->bukti_pembayaran) }}" alt="" width="50%"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div> 
                </div>
            </div>
        </section>
    </div>
    
    @endsection