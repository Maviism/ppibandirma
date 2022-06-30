<?php

namespace App\Http\Controllers;

use App\Models\NipCounter;
use Illuminate\Http\Request;

class NipGenerator extends Controller
{
    

    public function nipGenerator($arrival_year){
        // query anggota dengan tahun kedatangan 
        // count querynya
        // +1 untuk nomor urut kedatangan
        
        //format NIP 
        // kode PPI daerah
        $kode_ppidaerah = '4';
        // Tahun kedatangan 2 angka terakhir
        $get2lastnumber = substr($arrival_year, -2);
        // Nomor kedatangan
        $kode_urut = NipCounter::where('year', $arrival_year)->first()->counter;
        $kode_urut1 = str_pad($kode_urut, 3, '0', STR_PAD_LEFT);
        
        // Increment buat counter
        
        $nip = $kode_ppidaerah.$get2lastnumber.$kode_urut1;
        NipCounter::where('year', $arrival_year)->update(['counter' => $kode_urut + 1]);
        
        return $nip;
    }
}
