@extends('layouts.layouts')

@section('content')
<section id="detail" style="margin-top:100px" class="py-5">
    <div class="container col-xxl-8">
        <div class="mb-3">
            Home / Properti / Nama Rumah
        </div>
        <img src="{{ asset('storage/foto-rumah/'.$data->foto) }}" class="img-fluid mb-3" alt="">
        <div class="konten-properti">
            <h4 class="fw-bold mb-3">{{ $data->namarumah }}</h4>
            <p class="mb-3 text-secondary">Tipe Rumah :{{ $data->tiperumah }} | Harga {{ $data->hargarumah }}</p>
            
            <p>{{ $data->deskripsirumah }}</p>
            <p>{{ $data->alamatrumah }}</p>
            
        </div>
        <button class="btn btn-primary"> Pesan Sekarang</button>
        <button class="btn btn-primary">Booking</button>
        
        <div>
            <div class="stripe-hitam mt-5"></div>
            <h4 class="fw-bold mt-5" style="text-align: center">Form Simulasi KPR</h4>
            
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jumlah Kredit</label>
                    <input type="number" name="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                    @error('')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jangka Waktu</label>
                    <input type="number" name="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                    @error('')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Bunga Pertahun</label>
                    <input type="number" name="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                    @error('')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label class="form-label">Jenis KPR</label>
                    
                    <select name="" class="form-control">
                        <option>--Pilih--</option>
                        <option value="">Flat</option>
                        <option value="">Efektif</option>
                        <option value="">Anuitas</option>
                    </select>
                    @error('')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Hitung</button>
            </form>
        </div>
        
        <div>
            <div class="stripe-hitam mt-5"></div>
            <h4 class="fw-bold mt-5" style="text-align: center">Hasil Simulasi KPR</h4>
            <div>
                <p>Total Pinjaman           :</p>
                <p>Lama Pinjaman            :</p>
                <p>Bunga Pertahun           :</p>
                <p>Angsuran Pokok Perbulan  :</p>
                <p>Angsuran Bunga Perbulan  :</p>
                <p>Total angsuran Perbulan  :</p>
            </div>
            <div>
                
                <table class="table table-bordered table-striped mt-5">
                    <thead>
                        <tr>
                            
                            <th>Bulan</th>
                            <th>Pokok</th> 
                            <th>Bunga</th>
                            <th>Angsuran</th>
                            <th>Sisa Pinjaman</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Bulan</th>
                            <th>Pokok</th> 
                            <th>Bunga</th>
                            <th>Angsuran</th>
                            <th>Sisa Pinjaman</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div>
        </div>
    </div>
    
</section>
@endsection