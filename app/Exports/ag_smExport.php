<?php

namespace App\Exports;

use App\surat_masuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ag_smExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.Aplikasi1.agendaSurat.cetakagendasuratmasuk', [
            'datas' =>  $datas = \App\surat_masuk::where('tanggal_masuk','>=',request()->input('cari'))
            ->where('tanggal_masuk','<=',request()->input('cari2'))
            ->get()
        ]);
    }
}
