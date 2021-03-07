<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function suratkeluar(Request $request)
    {        
        if($request->has('cari') ){
            $sk = \App\surat_keluar::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->paginate(10);
        }else{                        
            $sk = \App\surat_keluar::orderBy('id', 'DESC')->paginate(10);
        }   
        return view('menu.Aplikasi1.suratKeluar.suratkeluar',compact('sk'));

    }public function buatsuratkeluar()
    {
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratKeluar.buatsuratkeluar',compact('ks','ss'));
    }
    //Surat Keluar
    public function store_sk(Request $request){    
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
        date_default_timezone_set('Asia/Jakarta');
        $sk = \App\surat_keluar::create([            
            'id_user'  => auth()->user()->id,     
            'no_surat' => $request->no_surat,
            'tujuan'=> $request->tujuan,
            'indeks'=> $request->indeks,
            'perihal'=> $request->perihal,
            'tanggal_keluar'=> $request->tanggal_keluar,
            'tanggal_diteruskan' =>$request->tanggal_diteruskan,
            'perihal'=> $request->perihal,
            'klasifikasi_surat'=> $request->klasifikasi_surat,
            'isi_ringkas'=> $isi,
            'catatan'=> $isi2,
        ]);
        return redirect('/suratkeluar')->with('status','Surat Keluar Berhasil Ditambahkan');
    }
    public function hapus_sk($id){
        $sk = \App\surat_keluar::find($id);
        $sk->delete($sk);
        return redirect('/suratkeluar')->with('status','Surat Keluar Berhasil Dihapus');
    }   
    public function editsuratkeluar($id){
        $sk = \App\surat_keluar::find($id);
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratKeluar.editsuratkeluar',compact('sk','ks','ss'));
    }
    public function lihatsuratkeluar($id){
        $sk = \App\surat_keluar::find($id);
        $lp = \App\lampiran_surat_keluar::where('id_surat','LIKE','%'.$id.'%')->get();
        return view('menu.Aplikasi1.suratKeluar.lihatsuratkeluar',compact('sk','lp'));
    }
    public function update_sk(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sk = \App\surat_keluar::find($id);        
    	$this->validate($request,[
    		'no_surat' => 'required',
            'tujuan'=> 'required',
            'indeks'=> 'required',
            'perihal'=> 'required',
            'tanggal_keluar'=> 'required',
            'tanggal_diteruskan' => 'required',
            'perihal'=>  'required',
            'klasifikasi_surat'=> 'required',
            'isi_ringkas'=>  'required',
            'catatan'=> 'required',
    	]);
        $sk->update($request->all());
        return redirect('/suratkeluar')->with('status','Surat Keluar Berhasil Diperbarui');
    }

    public function store_lsk(Request $request,$id){    
        $lsk = \App\lampiran_surat_keluar::create([            
            'id_surat'  =>$id,     
            'lampiran' => $request->lampiran,
        ]);
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = $request->file('lampiran')->getClientOriginalName();
            $request->file('lampiran')->move('file/surat_keluar/lampiran/',$filename);
            $lsk->lampiran = $request->file('lampiran')->getClientOriginalName();
            $lsk->save();
        }          
        return redirect('/suratkeluar/'.$id.'/lihat')->with('status','Lampiran Surat Keluar Berhasil Ditambahkan');
    }    
    
    public function hapus_lsk($id){
        $lsk = \App\lampiran_surat_keluar::find($id);
        $lsk->delete($lsk);
        return redirect()->back()->with('status','Lampiran Surat Keluar Berhasil Dihapus');
    }   
    public function verifikasi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sk = \App\surat_keluar::find($id);        
        // $dsm = \App\disposisi::find($id);        
        $data = [            
            'status' => 'Sudah',          
        ];
        $sk->update($data);     	
        return redirect('/suratkeluar')->with('status','Verifikasi Berhasil');
    }
}
