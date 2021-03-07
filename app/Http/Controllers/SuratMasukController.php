<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class SuratMasukController extends Controller
{
    public function suratmasuk(Request $request)
    {        
        if($request->has('cari')){
            if(auth()->user()->hak_akses == 'Sekretariatan' || auth()->user()->hak_akses == 'Admin' || auth()->user()->hak_akses == 'Kaur TU' || auth()->user()->hak_akses == 'Kajari') {
                $sm = \App\surat_masuk::where('dari','LIKE','%'.$request->cari.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{
                $sm = \App\surat_masuk::where('diteruskan','LIKE','%'.auth()->user()->hak_akses.'%')
                ->where('dari','LIKE','%'.$request->cari.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }
        }else{                     
            if(auth()->user()->hak_akses == 'Sekretariatan' || auth()->user()->hak_akses == 'Admin' || auth()->user()->hak_akses == 'Kaur TU' || auth()->user()->hak_akses == 'Kajari') {
                $sm = \App\surat_masuk::orderBy('id', 'DESC')->paginate(10);
            }else{
                $sm = \App\surat_masuk::where('diteruskan','LIKE','%'.auth()->user()->hak_akses.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }
        }   
        
        return view('menu.Aplikasi1.suratMasuk.suratmasuk',compact('sm'));

    }public function buatsuratmasuk()
    {
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratMasuk.buatsuratmasuk',compact('ks','ss'));
    }
    //Surat Masuk
    public function store_sm(Request $request){    
        date_default_timezone_set('Asia/Jakarta');
        if($request->isi_ringkas == null){
            $isi = '-';
        }else{
            $isi = $request->isi_ringkas;
        }
        if($request->catatan == null){
            $isi2 = '-';
        }else{
            $isi2 = $request->catatan;
        }
        $sm = \App\surat_masuk::create([            
            'id_user'  => auth()->user()->id,     
            'dari' => $request->dari,
            'no_surat'=> $request->no_surat,
            'diteruskan'=> $request->diteruskan,
            'indeks'=> $request->indeks,
            'perihal'=> $request->perihal,
            'tanggal_masuk'=> $request->tanggal_masuk,
            'tanggal_diteruskan' =>$request->tanggal_diteruskan,
            'perihal'=> $request->perihal,
            'sifat_surat'=> $request->sifat_surat,
            'klasifikasi_surat'=> $request->klasifikasi_surat,
            'isi_ringkas'=> $isi,
            'catatan'=> $isi2,
        ]);
        return redirect('/suratmasuk')->with('status','Surat Masuk Berhasil Ditambahkan');
    }
    public function hapus_sm($id){
        $sm = \App\surat_masuk::find($id);
        $sm->delete($sm);
        return redirect('/suratmasuk')->with('status','Surat Masuk Berhasil Dihapus');
    }   
    public function editsuratmasuk($id){
        $sm = \App\surat_masuk::find($id);
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratMasuk.editsuratmasuk',compact('sm','ks','ss'));
    }    
    public function update_sm(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sm = \App\surat_masuk::find($id);        
    	$this->validate($request,[
    		'dari' => 'required',
            'no_surat'=> 'required',
            'diteruskan'=> 'required',
            'indeks'=> 'required',
            'perihal'=> 'required',
            'tanggal_masuk'=> 'required',
            'tanggal_diteruskan' => 'required',
            'perihal'=>  'required',
            'sifat_surat'=>  'required',
            'klasifikasi_surat'=> 'required',
            'isi_ringkas'=>  'required',
            'catatan'=> 'required',
    	]);
        $sm->update($request->all());
        return redirect('/suratmasuk')->with('status','Surat Masuk Berhasil Diperbarui');
    }
    public function lihatsuratmasuk($id){
        $sm = \App\surat_masuk::find($id);
        $lp = \App\lampiran_surat_masuk::where('id_surat','LIKE','%'.$id.'%')->get();
        return view('menu.Aplikasi1.suratMasuk.lihatsuratmasuk',compact('sm','lp'));
    }
    public function store_lsm(Request $request,$id){    
        $lsm = \App\lampiran_surat_masuk::create([            
            'id_surat'  =>$id,     
            'lampiran' => $request->lampiran,
        ]);
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = $request->file('lampiran')->getClientOriginalName();
            $request->file('lampiran')->move('file/surat_masuk/lampiran/',$filename);
            $lsm->lampiran = $request->file('lampiran')->getClientOriginalName();
            $lsm->save();
        }          
        return redirect('/suratmasuk/'.$id.'/lihat')->with('status','Lampiran Surat Masuk Berhasil Ditambahkan');
    }    
    
    public function hapus_lsm($id){
        $lsm = \App\lampiran_surat_masuk::find($id);
        $lsm->delete($lsm);
        return redirect()->back()->with('status','Lampiran Surat Masuk Berhasil Dihapus');
    }   
    
    //DISPOSISI
    public function disposisi($id){
        $dp = \App\disposisi::where('id_surat','LIKE','%'.$id.'%')
        ->orderBy('id', 'DESC')->get();
        $mh = \App\master_harap::all();
        $sm = \App\surat_masuk::find($id);
        return view('menu.Aplikasi1.suratMasuk.disposisisuratmasuk',compact('dp','mh','sm'));
    }   
    public function store_dpsm(Request $request,$id){    
        date_default_timezone_set('Asia/Jakarta');
        $dpsm = \App\disposisi::create([            
            'id_jenis_surat'  => 1,     
            'id_surat' => $id,
            'harap'=> $request->harap,
            'pegawai_yang_tunjuk'=> $request->pegawai_yang_tunjuk,
            'catatan_admin_tu'=> $request->catatan_admin_tu,
            'catatan_admin_kepala'=> $request->catatan_admin_kepala,
            'verifikasi'=> $request->verifikasi,
            'tanggal_verifikasi' =>$request->tanggal_verifikasi,
        ]);
        return redirect('/suratmasuk/'.$id.'/disposisi')->with('status','Disposisi Berhasil Ditambahkan');
    }
    public function hapus_dsm($id){
        $dsm = \App\disposisi::find($id);
        $dsm->delete($dsm);
        return redirect()->back()->with('status','Disposisi Surat Masuk Berhasil Dihapus');
    }  
    public function lihat_dsm($id){
        $dsm = \App\disposisi::find($id);
        $sm = \App\surat_masuk::find($dsm->id_surat);      
        $dp = \App\disposisi::where('id_surat','LIKE','%'.$dsm->id_surat.'%')->get();  
        // dd($dp);
        return view('menu.Aplikasi1.suratMasuk.lihatdisposisisuratmasuk',compact('dsm','sm','dp'));
    }
    public function exportDisposisi($id)
    {   
        $dsm = \App\disposisi::find($id);
        $sm = \App\surat_masuk::find($dsm->id_surat); 
        $dp = \App\disposisi::where('id_surat','LIKE','%'.$dsm->id_surat.'%')->get();
        $pdf = PDF::loadView('menu.Aplikasi1.suratMasuk.disposisi',compact('dsm','sm','dp'))->setPaper('A5', 'potrait');
        return $pdf->download('disposisi.pdf');
    }  
    public function lihat_disposisi($id)
    {   
        $dsm = \App\disposisi::find($id);
        $sm = \App\surat_masuk::find($dsm->id_surat); 
        return view('menu.Aplikasi1.suratMasuk.disposisi',compact('dsm','sm'));
    }  
    public function editdisposisisuratmasuk($id){
        $dsm = \App\disposisi::find($id);
        $sm = \App\surat_masuk::find($dsm->id_surat);
        $mh = \App\master_harap::all();
        return view('menu.Aplikasi1.suratMasuk.ubahdisposisisuratmasuk',compact('sm','mh','dsm'));
    }    
    public function update_dsm(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $dsm = \App\disposisi::find($id);        
        $data = [            
            'harap'=> $request->harap,
            'pegawai_yang_tunjuk'=> $request->pegawai_yang_tunjuk,
            'catatan_admin_tu'=> $request->catatan_admin_tu,
            'catatan_admin_kepala'=> $request->catatan_admin_kepala,
            'verifikasi'=> $request->verifikasi,
            'tanggal_verifikasi' =>$request->tanggal_verifikasi,
        ];
        $dsm->update($data);        
        return redirect('/suratmasuk/'.$dsm->id_surat.'/disposisi')->with('status','Disposisi Surat Masuk Berhasil Diperbarui');
    }
    public function verifikasi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sm = \App\surat_masuk::find($id);        
        // $dsm = \App\disposisi::find($id);        
        $data = [            
            'status' => 'Sudah',          
        ];
        $sm->update($data);     	
        return redirect('/suratmasuk')->with('status','Verifikasi Berhasil');
    }
    public function konfirmasi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $dsm = \App\disposisi::find($id);        
        $data = [            
            'ttd' => 'Disetujui'
        ];
        $dsm->update($data);        
        return redirect('/suratmasuk/'.$dsm->id.'/disposisi')->with('status','Disposisi berhasil di konfirmasi');
    }
}
