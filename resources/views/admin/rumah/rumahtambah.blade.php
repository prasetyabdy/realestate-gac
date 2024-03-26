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
                            <h3 class="card-title">Tambah Data Rumah </h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('rumah.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Rumah</label>
                                            <input type="text" name="namarumah" class="form-control" placeholder="Enter ...">
                                            @error('namarumah')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Perumahan</label>
                                            
                                            <select name="category_id" class="form-control">
                                                <option>--Perumahan--</option>
                                                @foreach ($data as $d) 
                                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tipe Rumah</label>
                                            <input type="text" name="tiperumah" class="form-control" placeholder="Enter ...">
                                            @error('tiperumah')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kamar Tidur</label>
                                            <input type="text" name="kamartidur" class="form-control" placeholder="Enter ...">
                                            @error('kamartidur')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Kamar Mandi</label>
                                            <input type="text" name="kamarmandi" class="form-control" placeholder="Enter ...">
                                            @error('kamarmandi')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Garasi</label>
                                            <input type="text" name="garasi" class="form-control" placeholder="Enter ...">
                                            @error('garasi')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Harga Rumah</label>
                                            <input type="number" name="hargarumah" class="form-control" placeholder="Enter ...">
                                            @error('hargarumah')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Alamat Rumah</label>
                                            <textarea class="form-control" name="alamatrumah"  rows="3"></textarea>
                                            @error('alamatrumah')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>
                                                Deskripsi
                                            </label> 
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <textarea class="form-control" name="deskripsirumah" id="summernote" rows="3"></textarea>
                                                @error('deskripsirumah')
                                                <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="foto" class="form-control" placeholder="Enter ...">
                                            @error('foto')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option>--Pilih--</option>
                                                <option value="1">Tersedia</option>
                                                <option value="0">Tidak Tersedia</option>
                                            </select>
                                            @error('category_id')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                    </div>  
                                </div>
                                <!-- /.card -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            <!-- /.col -->
                            
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
                
                @endsection