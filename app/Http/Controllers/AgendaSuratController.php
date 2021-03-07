<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\ag_smExport;
use App\Exports\ag_skExport;
use App\Exports\ag_srExport;
use App\Exports\ag_spExport;

class AgendaSuratController extends Controller
{
    public function agendasurat()
    {
        return view('menu.Aplikasi1.agendaSurat.agendasurat');
    }
    //=================================================================================================
    public function agendasuratmasuk(Request $request)
    {
        if($request->has('cari') ){
            $ag_sm = \App\surat_masuk::where('dari','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('indeks','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                        
            $ag_sm = \App\surat_masuk::orderBy('id', 'DESC')->get();
        }   
        return view('menu.Aplikasi1.agendaSurat.agendasuratmasuk',compact('ag_sm'));
    }  
    
    public function exportDokumen(Request $request)
    {   
        $datas = \App\surat_masuk::where('tanggal_masuk','>=',$request->cari)
        ->where('tanggal_masuk','<=',$request->cari2)
        ->get();   
        // return view('menu.Aplikasi1.agendaSurat.cetakagendasuratmasuk',compact('datas'));
        if($request->type == 'Excel'){
            $nama_file = 'agenda-surat-masuk'.'_'.date('Y-m-d_H-i-s').'.xlsx';
            return Excel::download(new ag_smExport, $nama_file); 
        }else{
            $pdf = PDF::loadView('menu.Aplikasi1.agendaSurat.cetakagendasuratmasuk',compact('datas'))->setPaper('A4', 'landscape');
            return $pdf->download('agenda-surat-masuk.pdf');
        }
    }  

    public function to_excel_ag_sm(Request $request)
    {   
        $datas = \App\surat_masuk::where('tanggal_masuk','>=',$request->cari)
        ->where('tanggal_masuk','<=',$request->cari2)
        ->get();   
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratmasuk',compact('datas'));
    }
    //=================================================================================================
    public function agendasuratkeluar(Request $request)
    {
        if($request->has('cari') ){
            $ag_sk = \App\surat_keluar::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('indeks','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                        
            $ag_sk = \App\surat_keluar::orderBy('id', 'DESC')->get();
        }   
        return view('menu.Aplikasi1.agendaSurat.agendasuratkeluar',compact('ag_sk'));
    }
    public function exportDokumen_sk(Request $request)
    {   
        $datas_sk = \App\surat_keluar::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   

        if($request->type == 'Excel'){
            $nama_file = 'agenda-surat-keluar'.'_'.date('Y-m-d_H-i-s').'.xlsx';
            return Excel::download(new ag_skExport, $nama_file); 
        }else{
            $pdf = PDF::loadView('menu.Aplikasi1.agendaSurat.cetakagendasuratkeluar',compact('datas_sk'))->setPaper('A4', 'landscape');
            return $pdf->download('agenda-surat-keluar.pdf');
        }
    }  
    public function to_excel_ag_sk(Request $request)
    {   
        $datas_sk = \App\surat_keluar::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratkeluar',compact('datas_sk'));
    }
    //=================================================================================================
    public function agendasuratpengantar(Request $request)
    {
        if($request->has('cari') ){
            $ag_sp = \App\surat_pengantar::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                        
            $ag_sp = \App\surat_pengantar::orderBy('id', 'DESC')->get();
        }   
        return view('menu.Aplikasi1.agendaSurat.agendasuratpengantar',compact('ag_sp'));
    }
    public function exportDokumen_sp(Request $request)
    {   
        $datas_sp = \App\surat_pengantar::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   

        if($request->type == 'Excel'){
            $nama_file = 'agenda-surat-pengantar'.'_'.date('Y-m-d_H-i-s').'.xlsx';
            return Excel::download(new ag_spExport, $nama_file); 
        }else{
            $pdf = PDF::loadView('menu.Aplikasi1.agendaSurat.cetakagendasuratpengantar',compact('datas_sp'))->setPaper('A4', 'landscape');
            return $pdf->download('agenda-surat-pengantar.pdf');
        }
    }  
    public function to_excel_ag_sp(Request $request)
    {   
        $datas_sp = \App\surat_pengantar::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratpengantar',compact('datas_sp'));
    }
    //=================================================================================================
    public function agendasuratperintah(Request $request)
    {
        if($request->has('cari') ){
            $ag_sr = \App\surat_perintah::where('tujuan','LIKE','%'.$request->cari.'%')
            ->orWhere('no_surat','LIKE','%'.$request->cari.'%')
            ->orWhere('perihal','LIKE','%'.$request->cari.'%')
            ->orderBy('id', 'DESC')->get();
        }else{                        
            $ag_sr = \App\surat_perintah::orderBy('id', 'DESC')->get();
        }   
        return view('menu.Aplikasi1.agendaSurat.agendasuratperintah',compact('ag_sr'));
    }
    public function exportDokumen_sr(Request $request)
    {   
        $datas_sr = \App\surat_perintah::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   

        if($request->type == 'Excel'){
            $nama_file = 'agenda-surat-perintah'.'_'.date('Y-m-d_H-i-s').'.xlsx';
            return Excel::download(new ag_srExport, $nama_file); 
        }else{
            $pdf = PDF::loadView('menu.Aplikasi1.agendaSurat.cetakagendasuratperintah',compact('datas_sr'))->setPaper('A4', 'landscape');
            return $pdf->download('agenda-surat-perintah.pdf');
        }
    }  
    public function to_excel_ag_sr(Request $request)
    {   
        $datas_sr = \App\surat_perintah::where('tanggal_keluar','>=',$request->cari)
        ->where('tanggal_keluar','<=',$request->cari2)
        ->get();   
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratperintah',compact('datas_sr'));
    }
}
