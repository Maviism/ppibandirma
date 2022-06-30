<?php

namespace App\Imports;

use App\Http\Controllers\UserController;
use App\Models\NipCounter;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.name' => 'required',
            '*.email' => 'required|email:rfc,dns|unique:users',
            '*.date_of_birth' => 'required',
            //'*.place_of_birth' => 'required',
            '*.gender' => 'required|in:l,p,L,P',
            '*.phone_number' => 'nullable',
            '*.married' => 'required|in:sudah,belum,Sudah,Belum',
            '*.educational_type' => 'nullable',
            '*.university' => 'nullable',
            '*.faculty' => 'nullable',
            '*.departman' => 'nullable',
            '*.arrival_year' => 'nullable',
            '*.graduate_year' => 'nullable',
            '*.religion' => 'nullable',
            '*.blood_type' => 'nullable',
            '*.address_tr' => 'nullable',
            '*.provincial_origin' => 'nullable',
            '*.parent_phone_number' => 'nullable',
            //'*.student_no' => 'nullable|unique:identities',
        ])->validate();
        
        foreach($rows as $row){
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
            ]);
    
            $user->identity()->create([
                'user_id' => $user->id,
                'nip' => $this->nipGenerator($row['arrival_year']),
                'date_of_birth' => $row['date_of_birth'],
                //'place_of_birth' => $row['place_of_birth'],
                'gender' => $row['gender'],
                'phone_number' => $row['phone_number'],
                'married' => $row['married'],
                'educational_type' => $row['educational_type'],
                'university' => $row['university'],
                'faculty' => $row['faculty'],
                'departman' => $row['departman'],
                'arrival_year' => $row['arrival_year'],
                'graduate_year' => $row['arrival_year'],
                'religion' => $row['religion'],
                'blood_type' => $row['blood_type'],
                'address_tr' => $row['address_tr'],
                'provincial_origin' => $row['provincial_origin'],
                'parent_phone_number' => $row['parent_phone_number'],
                //'student_no' => $row['student_no'],
            ]);
    
            $active = new UserController;
            $active->activate($user);
        }

        return $user;
    }


    
    public function nipGenerator($arrival_year){
        
        // query anggota dengan tahun kedatangan 
        // count querynya
        // +1 untuk nomor urut kedatangan
        
        //format NIP 
        // kode PPI daerah
        $kode_ppidaerah = 4;
        // Tahun kedatangan 2 angka terakhir
        $get2lastnumber = substr($arrival_year, -2);
        // Nomor kedatangan
        $kode_urut = NipCounter::where('year', $arrival_year)->first()->counter;
        $kode_urut1 = str_pad($kode_urut, 3, '0', STR_PAD_LEFT);
        // Increment buat counter
        NipCounter::where('year', $arrival_year)->update(['counter' => $kode_urut + 1]);
        
        $nip = $kode_ppidaerah . $get2lastnumber . $kode_urut1;
    
        return $nip;
    }


   


}
