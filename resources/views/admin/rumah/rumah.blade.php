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
                                        <td>Rp. {{number_format($d->hargarumah) }}</td>
                                        <td><img src="{{ asset('storage/foto-rumah/'.$d->foto) }}" alt="" width="100"></td>
                                        <td>{{ $d->status === 1 ? "Tersedia" : "Tidak Tersedia" }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                        </td>
                                    </tr>  
                                        
                                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah kamu yakin ingin menghapus data Rumah <b>{{ $d->namarumah }}</b></p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <form action="{{ route('rumah.delete',['id' => $d->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Ya, Hapus Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

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