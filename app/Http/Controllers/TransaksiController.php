<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rumah;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function pesanan($id) {
        
        $rumah  = Rumah::find($id);
        
        return view('properti.pesanan', compact('rumah'));
    }
    
    public function pesananStore(Request $request,$id) {
        
        $validator = Validator::make($request->all(), [
            
            'no_identitas' => 'required',
            'pekerjaan' => 'required',
            'gaji' => 'required',
            'jenis_pembayaran' => 'required',
            'janji_temu' => 'required',
            
        ]);
        
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        
        $data['user_id'] = auth()->user()->id;
        $data['rumah_id'] = $id;
        $data['no_identitas'] = $request->no_identitas;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['gaji'] = $request->gaji;
        $data['jenis_pembayaran'] = $request->jenis_pembayaran;
        $data['janji_temu'] = $request->janji_temu;
        
        
        Pesanan::create($data);
        
        return redirect()->route('dashboard');
        
    }
    
    public function upBuktiPesanan(Request $request,$id){
        
        $upbuktipesanan  = Pesanan::find($id);
        
        return view('properti.upbukti_pesanan', compact('upbuktipesanan'));
    }
    
    public function upBuktiPesananStore(Request $request,$id) {
        
        $validator = Validator::make($request->all(), [
            'tanggal_pembayaran' => 'required',
            'bukti_pembayaran' => 'required|mimes:png,jpg,jpeg|max:2048',
            
        ]);
        
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $filename = date('Y-m-d') . $bukti_pembayaran->getClientOriginalName();
        $path = 'foto-bukti-pembayaran/' . $filename;
        
        Storage::disk('public')->put($path, file_get_contents($bukti_pembayaran));
        
        $data['tanggal_pembayaran'] = $request->tanggal_pembayaran;
        $data['bukti_pembayaran'] = $filename;
        
        
        
        Pesanan::whereId($id)->update($data);
        
        return redirect()->route('dashboard');
    }
    
    
    //Admin Pesanan
    public function pesananAdmin() {
        
        $adminpesanan = Pesanan::get();
        return view('admin.pesanan.pesanan', compact('adminpesanan'));
        
    }
    
    public function detailPesanan(Request $request,$id) {
        
        $detailpesanan = Pesanan::find($id);
        return view('admin.pesanan.detailpesanan', compact('detailpesanan'));
    }
    
    
    //Booking
    public function booking() {
        
        return view('properti.booking');
    }
    
    public function bookingAdmin() {
        return view('admin.booking.booking');
    }
    
    public function laporan() {
        return view('admin.pdf.laporan');
    }
    
    public function laporanDownload(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'pilih' => 'required',
            
        ]);
        
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        
        if ($request->pilih==1) {
            $dataPesan = Pesanan::get();

            $pdf = Pdf::loadView('admin.pdf.tampilpesanan', ['data'=>$dataPesan]);
            return $pdf->stream('Data Pesanan.pdf');
        }else{
            return redirect()->back();
        }   
        
    }
    
    
}
