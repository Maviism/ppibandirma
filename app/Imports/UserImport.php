<?php

namespace App\Imports;

use App\Http\Controllers\UserController;
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
            '*.email' => 'required|email:rfc,dns|unique:users'
        ])->validate();
        
        foreach($rows as $row){
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
            ]);
    
            $user->identity()->create([
                'user_id' => $user->id,
                'gender' => $row['gender'],
                'married' => $row['married'],
                'religion' => $row['religion'],
                'blood_type' => $row['blood_type'],
                'date_of_birth' => $row['date_of_birth'],
                'phone_number' => $row['phone_number'],
                'parent_phone_number' => $row['parent_phone_number'],
                'university' => $row['university'],
                'faculty' => $row['faculty'],
                'departman' => $row['departman'],
                'arrival_year' => $row['arrival_year'],
                'student_no' => $row['student_no'],
                'address_tr' => $row['address_tr'],
            ]);
    
            $active = new UserController;
            $active->activate($user);
        }

        return $user;
    }
}
