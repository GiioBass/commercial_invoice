<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'id' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'phone_number' => $row[3],
            'address' => $row[4], 
        ]);
    }
}
