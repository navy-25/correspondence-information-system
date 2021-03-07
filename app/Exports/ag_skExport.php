<?php

namespace App\Exports;

use App\surat_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ag_skExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratkeluar', [
            'datas_sk' =>  $datas = \App\surat_keluar::where('tanggal_keluar','>=',request()->input('cari'))
            ->where('tanggal_keluar','<=',request()->input('cari2'))
            ->get()
        ]);
    }
}
