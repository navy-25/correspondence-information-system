<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratPengantarController extends Controller
{
    public function suratpengantar(Request $request)
    {        
        if($request->has('cari') ){
            $sm = \App\surat_pengantar::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
            ->orderBy('id', 'DESC')->paginate(10);
        }else{                        
            $sp = \App\surat_pengantar::orderBy('id', 'DESC')->paginate(10);
        }   
        return view('menu.Aplikasi1.suratPengantar.suratpengantar',compact('sp'));

    }public function buatsuratpengantar()
    {
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratPengantar.buatsuratpengantar',compact('ss','ks'));
    }
    //Surat pengantar
    public function store_sp(Request $request){    
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
        $sp = \App\surat_pengantar::create([            
            'id_user'  => auth()->user()->id,     
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
        return redirect('/suratpengantar')->with('status','Surat Pengantar Berhasil Ditambahkan');
    }
    public function hapus_sp($id){
        $sp = \App\surat_pengantar::find($id);
        $sp->delete($sp);
        return redirect('/suratpengantar')->with('status','Surat Pengantar Berhasil Dihapus');
    }   
    public function editsuratpengantar($id){
        $sp = \App\surat_pengantar::find($id);
        $ks = \App\klasifikasi_surat::all();
        $ss = \App\sifat_surat::all();
        return view('menu.Aplikasi1.suratPengantar.editsuratpengantar',compact('sp','ss','ks'));
    }
    public function lihatsuratpengantar($id){
        $sp = \App\surat_pengantar::find($id);
        $lp = \App\lampiran_surat_pengantar::where('id_surat','LIKE','%'.$id.'%')->get();
        return view('menu.Aplikasi1.suratPengantar.lihatsuratpengantar',compact('sp','lp'));
    }
    public function update_sp(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sp = \App\surat_pengantar::find($id);        
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
        $sp->update($request->all());
        return redirect('/suratpengantar')->with('status','Surat Pengantar Berhasil Diperbarui');
    }
    public function store_lsp(Request $request,$id){    
        $lsp = \App\lampiran_surat_pengantar::create([            
            'id_surat'  =>$id,     
            'lampiran' => $request->lampiran,
        ]);
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = $request->file('lampiran')->getClientOriginalName();
            $request->file('lampiran')->move('file/surat_pengantar/lampiran/',$filename);
            $lsp->lampiran = $request->file('lampiran')->getClientOriginalName();
            $lsp->save();
        }          
        return redirect('/suratpengantar/'.$id.'/lihat')->with('status','Lampiran Surat Pengantar Berhasil Ditambahkan');
    }    
    
    public function hapus_lsp($id){
        $lsp = \App\lampiran_surat_pengantar::find($id);
        $lsp->delete($lsp);
        return redirect()->back()->with('status','Lampiran Surat Pengantar Berhasil Dihapus');
    }   
    public function verifikasi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $sp = \App\surat_pengantar::find($id);        
        // $dsm = \App\disposisi::find($id);        
        $data = [            
            'status' => 'Sudah',          
        ];
        $sp->update($data);     	
        return redirect('/suratpengantar')->with('status','Verifikasi Berhasil');
    }
}
