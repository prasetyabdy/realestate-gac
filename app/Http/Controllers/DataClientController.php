<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class DataClientController extends Controller
{
    public function index() {

        $data = User::get();

        return view('admin.client.client', compact('data'));
    }

    public function create() {
        return view('admin.client.tambahclient');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'nama' => 'required',
                'password' => 'required',
                'alamat' => 'required',
                'telepon' => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);
        $data['alamat'] = $request->alamat;
        $data['telepon'] = $request->telepon;

        User::create($data);
        
        return redirect()->route('index');
    }

    public function edit(Request $request,$id) {
        $data = User::find($id);

        return view('admin.client.editclient', compact('data'));
    }

    public function update(Request $request,$id) {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'nullable',
            'alamat' => 'required',
            'telepon' => 'required'
    ]);

    if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    $data['email'] = $request->email;
    $data['name'] = $request->nama;
    $data['alamat'] = $request->alamat;
    $data['telepon'] = $request->telepon;

    if($request->password) {
        $data['password'] = Hash::make($request->password);
    }
    
    
    User::whereId($id)->update($data);
    
    return redirect()->route('index');
    }

    public function delete(Request $request,$id) {
        $data = User::find($id);

        if($data) {
            $data->delete();
        }
        return redirect()->route('index');
    }

    //interfaceUser
    public function daftar() {
        return view('auth.daftar');
    }

    public function storeDaftar(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
    ]);

    if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    $data['email'] = $request->email;
    $data['name'] = $request->nama;
    $data['password'] = Hash::make($request->password);
    $data['alamat'] = $request->alamat;
    $data['telepon'] = $request->telepon;

    User::create($data);
    
    return redirect()->route('login');
    }
}
