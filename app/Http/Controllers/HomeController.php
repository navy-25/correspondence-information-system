<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function aplikasi1()
    {
        return view('menu.Aplikasi1.index');
    }
    public function aplikasi2(Request $request)
    {
        if($request->has('cari')){
            if(auth()->user()->hak_akses == 'Sekretariatan' || auth()->user()->hak_akses == 'Admin' || auth()->user()->hak_akses == 'Kajari') {
                $ptsp = \App\ptsp::where('nama','LIKE','%'.$request->cari.'%') 
                ->orderBy('id', 'DESC')->paginate(6);
            }else{
                $ptsp = \App\ptsp::where('nama','LIKE','%'.$request->cari.'%') 
                ->where('tujuan','LIKE','%'.auth()->user()->hak_akses.'%')
                // ->orderBy('id', 'DESC')->get();
                ->orderBy('id', 'DESC')->paginate(6);
            }

        }else{                     
            if(auth()->user()->hak_akses == 'Sekretariatan' || auth()->user()->hak_akses == 'Admin' || auth()->user()->hak_akses == 'Kajari') {
                $ptsp = \App\ptsp::orderBy('id', 'DESC')->paginate(6);
            }else{
                $ptsp = \App\ptsp::where('tujuan','LIKE','%'.auth()->user()->hak_akses.'%')
                ->orderBy('id', 'DESC')->paginate(6);
            }
            // $ptsp = \App\ptsp::->orderBy('id', 'DESC')->paginate(6);
        }
        
        return view('menu.Aplikasi2.index',compact('ptsp'));
    }
    public function error()
    {
        return view('error');
    }
}
