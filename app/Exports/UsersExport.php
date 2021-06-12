<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $buku = DB::table('rak_buku')->select('judul', 'jenis', 'tahun_terbit', 'rak_buku.id as id_rak')->join('buku','id_buku','=','buku.id')->join('jenis_buku','id_jenis_buku','jenis_buku.id')->get();
        return view('data0182', ['buku' => $buku]);
    }
}
