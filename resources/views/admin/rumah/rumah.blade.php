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
                                    <a href="{{ route('rumah.add') }}" class="btn btn-primary">Tambah Data</a>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Rumah</th>
                                        <th>Kategori</th> 
                                        <th>Tipe Rumah</th>
                                        <th>Harga Rumah</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->namarumah }}</td>
                                        <td>{{ $d->category->nama }}</td>
                                        <td>{{ $d->tiperumah }}</td>
                                        <td>Rp. {{ $d->hargarumah }}</td>
                                        <td><img src="{{ asset('storage/foto-rumah/'.$d->foto) }}" alt="" width="100"></td>
                                        <td>{{ $d->status === 1 ? "Tersedia" : "Tidak Tersedia" }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                            <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                        </td>
                                    </tr>  
                                        
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Rumah</th>
                                        <th>Kategori</th> 
                                        <th>Tipe Rumah</th>
                                        <th>Harga Rumah</th>
                                        <th>Foto</th>
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