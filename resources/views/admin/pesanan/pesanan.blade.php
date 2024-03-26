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
                    
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Rumah </h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <a href="" class="btn btn-primary">Tambah Data</a>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Rumah</th> 
                                        <th>Harga</th>
                                        <th>Jumlah Dibayarkan</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Jenis Pemabayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adminpesanan as $d)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->user->name }}</td>
                                        @if ($d->rumah)
                                        <td>{{ $d->rumah->namarumah }}</td>
                                        <td>Rp.{{ number_format($d->rumah->hargarumah) }}</td>
                                        @else
                                        <td>null</td>
                                        <td>null</td>
                                        @endif
                                        
                                        <td>
                                            @if ($d->jml_pembayaran)
                                                {{ $d->jml_pembayaran }}
                                            @else
                                                Rp.0
                                            @endif
                                        </td>
                                        <td>{{ $d->created_at  }}</td>
                                        <td>{{ $d->jenis_pembayaran }}</td>
                                        <td>{{ $d->status === 1 ? "Konfirmasi" : "Belum Dikonfirmasi" }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary mb-1"><i class="fas fa-pen">Reminder</i></a>
                                            <br><a href="" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i>Hapus</a>
                                            <br><a href="{{ route('pesanan.detail', ['id' => $d->id]) }}" class="btn btn-dark"><i class="fas fa-pen"></i>Detail</a>
                                        </td>
                                    </tr>  
                                        
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Rumah</th> 
                                        <th>Harga</th>
                                        <th>Jumlah Dibayarkan</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Jenis Pemabayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection