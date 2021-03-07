<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class ptspController extends Controller
{
    public function store_ptsp(Request $request){    
        $ptsp = \App\ptsp::create([            
            'nama' => $request->nama,
            'instansi'=> $request->instansi,
            'keperluan'=> $request->keperluan,
            'tujuan'=> $request->tujuan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tindak_lanjut_bidang' => $request->tindak_lanjut_bidang,
            'foto' => $request->foto,

            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('file/foto/',$filename);
            $ptsp->foto = $request->file('foto')->getClientOriginalName();
            $ptsp->save();
        }   
        if ($request->hasFile('tindak_lanjut_bidang')) {
            $file = $request->file('tindak_lanjut_bidang');
            $filename = $request->file('tindak_lanjut_bidang')->getClientOriginalName();
            $request->file('tindak_lanjut_bidang')->move('file/tindak_lanjut_bidang/',$filename);
            $ptsp->tindak_lanjut_bidang = $request->file('tindak_lanjut_bidang')->getClientOriginalName();
            $ptsp->save();
        }     
        return redirect('/ptsp')->with('status','Pengajuan Berhasil Dibuat');
    }
    public function editptsp($id){
        $ptsp = \App\ptsp::find($id);
        return view('menu.Aplikasi2.edit_ptsp',compact('ptsp'));
    }
    public function update_ptsp(Request $request,$id){
        $ptsp = \App\ptsp::find($id);            
        if ($request->hasFile('tindak_lanjut_bidang')) {
            $file = $request->file('tindak_lanjut_bidang');
            $filename = $request->file('tindak_lanjut_bidang')->getClientOriginalName();
            $request->file('tindak_lanjut_bidang')->move('file/tindak_lanjut_bidang/',$filename);
            $ptsp->tindak_lanjut_bidang = $request->file('tindak_lanjut_bidang')->getClientOriginalName();
            $ptsp->save();
        }    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('file/foto/',$filename);
            $ptsp->foto = $request->file('foto')->getClientOriginalName();
            $ptsp->save();
        }   
        if( auth()->user()->is_admin != 'pegawai'  ){
            $this->validate($request,[
                'nama' => 'required',
                'instansi'=> 'required',
                'keperluan'=> 'required',
                'tujuan'=> 'required',
                'tanggal_masuk'=> 'required',
                'nik'=> 'required',
                // 'email'=> 'required',
                'alamat'=> 'required',
                'telepon'=> 'required',
            ]);
            $data = [            
                'nama' => $request->nama,
                'instansi'=> $request->instansi,
                'keperluan'=> $request->keperluan,
                'tujuan'=> $request->tujuan,
                'tanggal_masuk' => $request->tanggal_masuk,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'email' => $request->email,
            ];
            $ptsp->update($data);
        }
        return redirect('/ptsp')->with('status','Pengajuan Berhasil Diperbarui');
    }
    public function hapus_ptsp($id){
        $ptsp = \App\ptsp::find($id);
        $ptsp->delete($ptsp);
        return redirect('/ptsp')->with('status','Pengajuan Berhasi Dibatalkan');
    }   
    public function ajukan_ptsp()
    {
        return view('menu.Aplikasi2.buat_ptsp');
    }
    public function toblangko ($id)
    {   
        $ptsp = \App\ptsp::find($id);
        return view('menu.Aplikasi2.lihat_blangko',compact('ptsp'));
    }  
    public function downloadblangko ($id)
    {   
        $ptsp = \App\ptsp::find($id);
        $pdf = PDF::loadView('menu.Aplikasi2.blangko',compact('ptsp'))->setPaper('A5', 'potrait');
        return $pdf->download('blangko.pdf');
    }  
}
