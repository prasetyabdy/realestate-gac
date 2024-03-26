@extends('layouts.layouts')

@section('content')

<section style="margin-top: 100px">
    <div class="container py-5 col-xxl-6"> 
        <h3 class="fw-bold mb-4 text-center" style="color: #1d7ce1">Daftar</h3>
        
        <form action="{{ route('daftar.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('email')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('nama')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                @error('password')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('alamat')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No HP(WA)</label>
                <input type="number" name="telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
                @error('telepon')
                <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Daftar</button>

            <div class="mt-3 text-center">
                Silahkan <a href="/login">Login!</a> jika sudah daftar
            </div>
        </form>
        
    </div>
</section>
@endsection