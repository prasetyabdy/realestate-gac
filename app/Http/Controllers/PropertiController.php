<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PropertiController extends Controller
{
    
    //PERUMAHAN
    public function perumahan() {
        
        $data = Category::get();
        return view('admin.perumahan.perumahan', compact('data'));
    }
    
    public function addPerumahan() {
        return view('admin.perumahan.tambahperumahan');
    }
    
    public function storePerumahan(Request $request) {
        
        $validator = Validator::make($request->all(), [  
            'nama' => 'required'
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $data['nama'] = $request->nama;
        
        Category::create($data);
        
        return redirect()->route('perumahan');
    }
    
    public function editPerumahan(Request $request,$id) {
        $data = Category::find($id);
        
        return view('admin.perumahan.editperumahan',compact('data'));
    }
    
    public function updatePerumahan(Request $request,$id) {
        
        $validator = Validator::make($request->all(), [  
            'nama' => 'required'
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $data['nama'] = $request->nama;
        
        Category::whereId($id)->update($data);
        
        return redirect()->route('perumahan');
    }
    
    public function deletePerumahan(Request $request,$id) {
        $data = Category::find($id);
        
        if($data) {
            $data->delete();
        }
        return redirect()->route('perumahan');
    }
    
    
    //RUMAAH
    public function rumah() {
        
        $data = Rumah::get();
        return view('admin.rumah.rumah', compact('data'));
    }
    
    public function addRumah() {
        $data = Category::get();
        return view('admin.rumah.rumahtambah', compact('data'));
    }
    
    public function storeRumah(Request $request) {
        
        
        $validator = Validator::make($request->all(), [
            'namarumah' => 'required',
            'category_id' => 'required',
            'tiperumah' => 'required',
            'hargarumah' => 'required',
            'alamatrumah' => 'required',
            'deskripsirumah' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'status' => 'required'
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $foto = $request->file('foto');
        $filename = date('Y-m-d').$foto->getClientOriginalName();
        $path = 'foto-rumah/'.$filename;
        
        Storage::disk('public')->put($path,file_get_contents($foto));
        
        $data['namarumah'] = $request->namarumah;
        $data['category_id'] = $request->category_id;
        $data['tiperumah'] = $request->tiperumah;
        $data['hargarumah'] = $request->hargarumah;
        $data['alamatrumah'] = $request->alamatrumah;
        $data['deskripsirumah'] = $request->deskripsirumah;
        $data['foto'] = $filename;
        $data['status'] = $request->status;
        
        
        Rumah::create($data);
        
        return redirect()->route('rumah');
    }
    
    //Tampilan User
    public function properti() {

        $data = Rumah::get();
        return view('properti.properti', compact('data'));
    }

    public function detailProperti(Request $request,$id) {
        $data = Rumah::find($id);

        return view('properti.detail', compact('data'));
    }
}
