<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $user = User::create([
            'name' => $row[1],
            'email' => $row[2],
        ]);

        $user->identity()->create([
            'fakultas_prodi' => $row[3],
            'gender' => $row[4],
            'passport_no' => $row[5],
            'user_id' => $user->id
        ]);

        return $user;
    }
}
