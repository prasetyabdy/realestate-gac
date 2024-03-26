<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function welcome() {
        
        $data = Rumah::get();
        return view('welcome', compact('data'));
    }

    public function service() {
        return view('service');
    }

    public function gallery() {
        return view('gallery');
    }

    public function tentang() {
        return view('tentang');
    }
    
    public function index()
    {
        $pesananPesanan = Pesanan::where('user_id', auth()->id())->get();
        return view('client.client', compact('pesananPesanan'));
    }
}
