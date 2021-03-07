<?php

namespace App\Exports;

use App\surat_pengantar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ag_spExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratpengantar', [
            'datas_sp' =>  $datas_sp = \App\surat_pengantar::where('tanggal_keluar','>=',request()->input('cari'))
            ->where('tanggal_keluar','<=',request()->input('cari2'))
            ->get()
        ]);
    }
}