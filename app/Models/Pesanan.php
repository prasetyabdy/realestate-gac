<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'rumah_id',
        'no_identitas',
        'pekerjaan',
        'gaji',
        'jenis_pembayaran',
        'janji_temu',
        'bukti_pembayaran',
        'tanggal_pembayaran',
        'jml_pembayaran',
        'status'
    ];
}
