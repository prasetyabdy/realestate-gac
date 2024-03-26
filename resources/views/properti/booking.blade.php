@extends('layouts.layouts')

@section('content')
<section style="margin-top: 100px">
    <div class="container py-5">
        
        <img src="{{ asset('storage/foto-rumah/' . $rumah->foto) }}" class="img-fluid mb-3" alt="">
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Rumah</th>
                    <th>Tipe Rumah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{ $rumah->namarumah }}</td>
                    <td>{{ $rumah->tiperumah }}</td>
                    <td>{{ $rumah->hargarumah }}</td>
                </tr>
                
            </tbody>
        </table>
        
        <div>
            
            <form action="{{ route('pesanan.store', ['id' => $rumah->id]) }}" method="POST" style="margin-top: 100px">
                @csrf
                <h3 class="fw-bold text-center">Form Pesanan</h3>
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="" class="form-control" disabled
                    aria-describedby="emailHelp" value="{{ auth()->user()->name }}">
                    
                    
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="" class="form-control" disabled
                    aria-describedby="emailHelp" value="{{ auth()->user()->email }}">  
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">No KTP</label>
                    <input type="text" name="no_identitas" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('no_identitas')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('pekerjaan')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Gaji</label>
                    <input type="number" name="gaji" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('gaji')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <input type="text" name="" class="form-control" disabled
                    aria-describedby="emailHelp" value="{{ auth()->user()->alamat }}">
                    
                    
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">No HP</label>
                    <input type="text" name="" class="form-control" disabled
                    aria-describedby="emailHelp" value="{{ auth()->user()->telepon }}">
                    
                   
                </div>
                
                
                <div class=" mt-3">
                    <label class="form-label">Jenis Pembayaran</label>
                    
                    <select name="jenis_pembayaran" class="form-control">
                        <option>--Pilih--</option>
                        <option value="Cash">Cash</option>
                        <option value="Cash Bertahap">Cash Bertahap</option>
                        <option value="KPR">KPR</option>
                        
                    </select>
                    @error('jenis_pembayaran')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                   
                </div>
                
                <div class="mt-3">
                    <label for="exampleInputEmail1" class="form-label">Janji Temu</label>
                    <input type="datetime-local" name="janji_temu" class="form-control" 
                    aria-describedby="emailHelp" value="">
                    
                    @error('janji_temu')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mt-5">Selesaikan Pembayaran</button>
            </form>
            </div>
        </div>
    </section>
    @endsection
    