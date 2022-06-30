<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
 

    public function collection()
    {
        return DB::table('users')
                ->join('identities', 'users.id', '=', 'identities.user_id')->select(
                    'users.id',
                    'identities.nip',
                    'identities.arrival_year', 
                    'identities.graduate_year',
                    'users.name',
                    'identities.gender', 
                    'identities.religion', 
                    'identities.place_of_birth', 
                    'identities.date_of_birth', 
                    'identities.provincial_origin',
                    'identities.address_tr',
                    'identities.phone_number'
                    )
                ->get();
    }

    public function headings() : array{
        return [
            'No',
            'NIP',
            'Tahun Kedatangan',
            'Tahun Lulus',
            'Nama',
            'Gender',
            'Religion',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Provinsi Asal',
            'Alamat turki',
            'Nomor Hp'
        ];
    }

    
}
