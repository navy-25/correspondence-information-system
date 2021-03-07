<?php

namespace App\Exports;

use App\surat_perintah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ag_srExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratmasuk', [
            'datas' =>  $datas = \App\surat_perintah::where('tanggal_keluar','>=',request()->input('cari'))
            ->where('tanggal_keluar','<=',request()->input('cari2'))
            ->get()
        ]);
    }
}
