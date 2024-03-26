@extends('layouts.layouts')

@section('content')
<section style="margin-top: 150px">
    <div class="container py-5">
        
        
        <div>
            
            <div>
                <h3 class="fw-bold text-center">Upload Bukti Pembayaran</h3>
                
                <div class="mt-3">
                    <p>Nama : {{ auth()->user()->name }}</p>
                    <p>Telepon : {{ auth()->user()->telepon }}</p>
                    <p>Email : {{ auth()->user()->email }}</p>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Rumah</th>
                            <th>Tipe Rumah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>{{ $upbuktipesanan->rumah->namarumah }}</td>
                            <td>{{ $upbuktipesanan->rumah->tiperumah }}</td>
                            <td>Rp.{{ number_format($upbuktipesanan->rumah->hargarumah) }}</td>
                        </tr>
                        
                    </tbody>
                </table>
                
                
                <form action="{{ route('upbuktipesanan.store', ['id' => $upbuktipesanan->id]) }}" method="POST" enctype="multipart/form-data" style="margin-top: 100px">
                    @csrf
                    <div class="mb-3 text-secondary">Kirim Bukti Pembayaran</div>
                    <div class="fw-bold">
                        <div>No Rek 1 BCA : 8735572683</div>
                        <div>No Rek 2 BRI : 205101016837509</div>
                        <div>No Rek 3 BNI : 3246846583476</div>
                    </div>
                    <div class="alert alert-success mt-2 col-3"> Minimal DP : <b>Rp.200.000.000</div>

                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Transfer</label>
                    <input type="date" name="tanggal_pembayaran" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('tanggal_pembayaran')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('bukti_pembayaran')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-5">Kirim</button>
                </form>
            </div>
        </div>
    </section>
    @endsection
    