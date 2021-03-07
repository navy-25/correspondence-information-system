<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterSuratController extends Controller
{
    public function mastersurat()
    {
        return view('menu.Aplikasi1.masterSurat.mastersurat');
    }
    //ke klasikasisurat
    public function klasifikasisurat(Request $request)
    {
        if($request->has('cari') ){
            $ks = \App\klasifikasi_surat::where('nama_klasifikasi','LIKE','%'.$request->cari.'%')
            ->orWhere('kode_klasifikasi','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                                    
            $ks = \App\klasifikasi_surat::all();
        }   
        return view('menu.Aplikasi1.masterSurat.klasifikasisurat.klasifikasi_surat',compact('ks'));
    }
    public function tambahklasifikasisurat()
    {
        return view('menu.Aplikasi1.masterSurat.klasifikasisurat.tambah_klasifikasi_surat');
    }
    public function store_klasifikasisurat(Request $request){       
        $ks = \App\klasifikasi_surat::create([            
            'kode_klasifikasi'  => $request->kode_klasifikasi,    
            'nama_klasifikasi' => $request->nama_klasifikasi,    
        ]);
        return redirect('/klasifikasisurat')->with('status','Klasifikasi Surat Berhasil Ditambahkan');
    }
    public function hapus_ks($id){
        $ks = \App\klasifikasi_surat::find($id);
        $ks->delete($ks);
        return redirect('/klasifikasisurat')->with('status','Klasifikasi Surat Berhasil Dihapus');
    }   
    public function editklasifikasisurat($id){
        $ks = \App\klasifikasi_surat::find($id);
        return view('menu.Aplikasi1.masterSurat.klasifikasisurat.edit_klasifikasi_surat',compact('ks'));
    }
    public function update_ks(Request $request,$id){
        $ks = \App\klasifikasi_surat::find($id);        
    	$this->validate($request,[
    		'kode_klasifikasi' => 'required',
            'nama_klasifikasi'=> 'required',
    	]);
        $ks->update($request->all());
        return redirect('/klasifikasisurat')->with('status','Klasifikasi Surat Berhasil Diperbarui');
    }
    //==================================================================================================
    //ke sifatsurat
    public function sifatsurat(Request $request)
    {
        if($request->has('cari') ){
            $ss = \App\sifat_surat::where('nama_sifat_surat','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                                    
            $ss = \App\sifat_surat::all();
        }   
        return view('menu.Aplikasi1.masterSurat.sifatsurat.sifat_surat',compact('ss'));
    }
    public function tambahsifatsurat()
    {
        return view('menu.Aplikasi1.masterSurat.sifatsurat.tambah_sifat_surat');
    }
    public function store_sifatsurat(Request $request){       
        $ss = \App\sifat_surat::create([            
            'nama_sifat_surat'  => $request->nama_sifat_surat,    
        ]);
        return redirect('/sifatsurat')->with('status','Sifat Surat Berhasil Ditambahkan');
    }
    public function editsifatsurat($id){
        $ss = \App\sifat_surat::find($id);
        return view('menu.Aplikasi1.masterSurat.sifatsurat.edit_sifat_surat',compact('ss'));
    }
    public function update_ss(Request $request,$id){
        $ss = \App\sifat_surat::find($id);        
    	$this->validate($request,[
    		'nama_sifat_surat' => 'required',
    	]);
        $ss->update($request->all());
        return redirect('/sifatsurat')->with('status','Sifat Surat Berhasil Diperbarui');
    }
    public function hapus_ss($id){
        $ss = \App\sifat_surat::find($id);
        $ss->delete($ss);
        return redirect('/sifatsurat')->with('status','Sifat Surat Berhasil Dihapus');
    }   
    //==================================================================================================
    //ke masterharap
    public function masterharap(Request $request)
    {
        if($request->has('cari') ){
            $mh = \App\master_harap::where('nama_harap','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                                    
            $mh = \App\master_harap::all();
        }  
        return view('menu.Aplikasi1.masterSurat.masterharap.master_harap',compact('mh'));
    }
    public function tambahmasterharap()
    {
        return view('menu.Aplikasi1.masterSurat.masterharap.tambah_master_harap');
    }
    public function store_masterharap(Request $request){       
        $mh = \App\master_harap::create([            
            'nama_harap'  => $request->nama_harap,    
        ]);
        return redirect('/masterharap')->with('status','Master Harap Berhasil Ditambahkan');
    }
    public function editmasterharap($id){
        $mh = \App\master_harap::find($id);
        return view('menu.Aplikasi1.masterSurat.masterharap.edit_master_harap',compact('mh'));
    }
    public function update_mh(Request $request,$id){
        $mh = \App\master_harap::find($id);        
    	$this->validate($request,[
    		'nama_harap' => 'required',
    	]);
        $mh->update($request->all());
        return redirect('/masterharap')->with('status','Master Harap Berhasil Diperbarui');
    }
    public function hapus_mh($id){
        $mh = \App\master_harap::find($id);
        $mh->delete($mh);
        return redirect('/masterharap')->with('status','Master Harap Berhasil Dihapus');
    }   
}
