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
                            <h3 class="card-title">Edit Data Perumahan </h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('perumahan.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
        
                                        <div class="form-group">
                                            <label>Nama Perumahan</label>
                                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" placeholder="Nama ...">
                                            @error('nama')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        
                                        <div class="form-group">
                                            <label>Foto Perumahan</label>
                                            <input type="file" name="foto" class="form-control" value="{{ $data->nama }}" placeholder="Nama ...">
                                            @error('foto')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        @if ($data->foto)
                                            <img src="{{ asset('storage/foto-perumahan/'. $data->foto) }}" width="150px" height="100px" alt="">
                                        @endif
                                        
                                    </div>
                                    
                                </div> 
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
    @endsection