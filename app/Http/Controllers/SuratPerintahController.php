<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPerintahController extends Controller
{
    public function suratperintah(Request $request)
    {        
        if($request->has('cari') ){
            $sr = \App\surat_perintah::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
            ->orderBy('id', 'DESC')->paginate(10);
        }else{                        
            $sr = \App\surat_perintah::orderBy('id', 'DESC')->paginate(10);
        }   
        return view('menu.Aplikasi1.suratPerintah.suratperintah',compact('sr'));

    }public function buatsuratperintah()
    {
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratPerintah.buatsuratperintah',compact('ss','ks'));
    }
    //Surat Perintah
    public function store_sr(Request $request){    
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
        $sr = \App\surat_perintah::create([            
            'id_user'  => auth()->user()->id,     
            // 'kepada' => $request->kepada,
            'tujuan'=> $request->tujuan,
            'no_surat'=> $request->no_surat,
            'perihal'=> $request->perihal,
            'tanggal_keluar'=> $request->tanggal_keluar,
            'tanggal_diteruskan' =>$request->tanggal_diteruskan,
            'perihal'=> $request->perihal,
            'klasifikasi_surat'=> $request->klasifikasi_surat,
            'isi_ringkas'=> $isi,
            'catatan'=> $isi2,
        ]);
        return redirect('/suratperintah')->with('status','Surat Perintah Berhasil Ditambahkan');
    }
    public function hapus_sr($id){
        $sr = \App\surat_perintah::find($id);
        $sr->delete($sr);
        return redirect('/suratperintah')->with('status','Surat Perintah Berhasil Dihapus');
    }   
    public function editsuratperintah($id){
        $sr = \App\surat_perintah::find($id);
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratPerintah.editsuratperintah',compact('sr','ks','ss'));
    }
    public function lihatsuratperintah($id){
        $sr = \App\surat_perintah::find($id);
        $lp = \App\lampiran_surat_perintah::where('id_surat','LIKE','%'.$id.'%')->get();
        return view('menu.Aplikasi1.suratPerintah.lihatsuratperintah',compact('sr','lp'));
    }
    public function update_sr(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sr = \App\surat_perintah::find($id);        
    	$this->validate($request,[
    		// 'kepada' => 'required',
            'tujuan'=> 'required',
            'no_surat'=> 'required',
            'perihal'=> 'required',
            'tanggal_keluar'=> 'required',
            'tanggal_diteruskan' => 'required',
            'perihal'=>  'required',
            'klasifikasi_surat'=> 'required',
            'isi_ringkas'=>  'required',
            'catatan'=> 'required',
    	]);
        $sr->update($request->all());
        return redirect('/suratperintah')->with('status','Surat Perintah Berhasil Diperbarui');
    }
    public function store_lspr(Request $request,$id){    
        $lspr = \App\lampiran_surat_perintah::create([            
            'id_surat'  =>$id,     
            'lampiran' => $request->lampiran,
        ]);
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = $request->file('lampiran')->getClientOriginalName();
            $request->file('lampiran')->move('file/surat_perintah/lampiran/',$filename);
            $lspr->lampiran = $request->file('lampiran')->getClientOriginalName();
            $lspr->save();
        }          
        return redirect('/suratperintah/'.$id.'/lihat')->with('status','Lampiran Surat Perintah Berhasil Ditambahkan');
    }    
    
    public function hapus_lspr($id){
        $lspr = \App\lampiran_surat_perintah::find($id);
        $lspr->delete($lspr);
        return redirect()->back()->with('status','Lampiran Surat Perintah Berhasil Dihapus');
    }   
    public function verifikasi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sr = \App\surat_perintah::find($id);        
        // $dsm = \App\disposisi::find($id);        
        $data = [            
            'status' => 'Sudah',          
        ];
        $sr->update($data);     	
        return redirect('/suratperintah')->with('status','Verifikasi Berhasil');
    }
}
