<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pesanan</h1>

    <table class="table" style="border: 5px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nama Rumah</th> 
                <th>Harga</th>
                <th>Jumlah Dibayarkan</th>
                <th>Tanggal Pesanan</th>
                <th>Jenis Pemabayaran</th>
                <th>Status</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->user->name }}</td>
                @if ($d->rumah)
                <td>{{ $d->rumah->namarumah }}</td>
                <td>Rp.{{ number_format($d->rumah->hargarumah) }}</td>
                @else
                <td>null</td>
                <td>null</td>
                @endif
                
                <td>
                    @if ($d->jml_pembayaran)
                        {{ $d->jml_pembayaran }}
                    @else
                        Rp.0
                    @endif
                </td>
                <td>{{ $d->created_at  }}</td>
                <td>{{ $d->jenis_pembayaran }}</td>
                <td>{{ $d->status === 1 ? "Konfirmasi" : "Belum Dikonfirmasi" }}</td>
                
            </tr>  
                
            @endforeach 
        </tbody>
    </table>

</body>
</html>