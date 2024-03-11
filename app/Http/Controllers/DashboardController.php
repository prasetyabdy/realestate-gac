<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $pesananPesanan = Pesanan::where('user_id', auth()->id())->get();
        return view('client.client', compact('pesananPesanan'));
    }
}
