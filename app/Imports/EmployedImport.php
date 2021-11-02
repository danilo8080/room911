<?php

namespace App\Imports;

use App\Models\Employed;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployedImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employed([
            'employedID' => $row[0],
            'department' => $row[1],
            'lastName' => $row[2],
            'middleName' => $row[3],
            'firstName' => $row[4],
            'access' => $row[5],
        ]);
    }
}
