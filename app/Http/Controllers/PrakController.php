<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class PrakController extends Controller
{
    public function buku(){
        $buku = DB::table('rak_buku')->select('judul', 'jenis', 'tahun_terbit', 'rak_buku.id as id_rak')->join('buku','id_buku','=','buku.id')->join('jenis_buku','id_jenis_buku','jenis_buku.id')->get();
        // dd($buku->all());
        return view('buku0182',['buku' => $buku]);
    }
    public function user(){
        $user = DB::table('user')->get();
        return view('user0182',['user' => $user]);
    }
    public function export(){
        return Excel::download(new UsersExport, 'data_1461900182.xlsx');
    }
}
