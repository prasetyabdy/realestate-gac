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
                            <h3 class="card-title">Laporan</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('laporan.download') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">

                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Laporan</label>
                                            
                                            <select name="pilih" class="form-control">
                                                <option value="">--Pilih--</option>                                               
                                                <option value="1">Pesanan</option>
                                                <option value="2">Booking</option>
                                            </select>
                                            @error('pilih')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                    </div>  
                                </div>
                                <!-- /.card -->
                                <button type="submit" class="btn btn-primary">Download</button>
                            </form>
                            <!-- /.col -->
                            
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
                
                @endsection