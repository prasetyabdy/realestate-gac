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
                            <h3 class="card-title">Data Booking </h3>
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
                                    
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                    </tr>  
                                    
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