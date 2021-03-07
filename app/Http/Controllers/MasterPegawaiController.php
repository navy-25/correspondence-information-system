<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MasterPegawaiController extends Controller
{
    public function masterpegawai(Request $request)
    {
        if($request->has('cari') ){
            $mp = \App\User::where('name','LIKE','%'.$request->cari.'%')
                ->where('is_admin','LIKE','%'.'user'.'%')
                ->orWhere('is_admin','LIKE','%'.'pegawai'.'%')
                ->orWhere('is_admin','LIKE','%'.'kajari'.'%')
                ->orWhere('is_admin','LIKE','%'.'kaurtu'.'%')
                ->orderBy('id', 'DESC')->paginate(10);
        }else{                        
            $mp = \App\User::where('is_admin','LIKE','%'.'user'.'%')
                ->orWhere('is_admin','LIKE','%'.'pegawai'.'%')
                ->orWhere('is_admin','LIKE','%'.'kajari'.'%')
                ->orWhere('is_admin','LIKE','%'.'kaurtu'.'%')
                ->orderBy('id', 'DESC')->paginate(10);
        }   
        return view('menu.Aplikasi1.masterPegawai.masterpegawai',compact('mp'));
    }
    public function hapus($id){
        $mp = \App\User::find($id);
        $mp->delete($mp);
        return redirect('/masterpegawai')->with('status','Data Berhasil Dihapus');
    }   
    public function store_pegawai(Request $request){       
        if($request->hak_akses=='Sekretariatan'){
            $akses = 'user';
        }else if($request->hak_akses=='Kaur TU'){
            $akses = 'kaurtu';
        }else if($request->hak_akses=='Kajari'){
            $akses = 'kajari';
        }else if($request->hak_akses=='Pidum'){
            $akses = 'pegawai';
        }else if($request->hak_akses=='Pidsus'){
            $akses = 'pegawai';
        }else if($request->hak_akses=='Datun'){
            $akses = 'pegawai';
        }else if($request->hak_akses=='Intel'){
            $akses = 'pegawai';
        }else if($request->hak_akses=='BB & Barang Rampasan'){
            $akses = 'pegawai';
        }else  if($request->hak_akses=='Kasubbagbin'){
            $akses = 'pegawai';
        }else  if($request->hak_akses=='Bendahara'){
            $akses = 'pegawai';
        }
        $users = \App\User::create([            
            'is_admin' => $akses,    
            'name'  => $request->name,    
            'username' => $request->username,    
            'password' => Hash::make($request->password),
            'jabatan'  => $request->jabatan,
            'hak_akses'  => $request->hak_akses,
        ]);
        return redirect('/masterpegawai')->with('status','Data Berhasil Ditambahkan');
    }
   
}
