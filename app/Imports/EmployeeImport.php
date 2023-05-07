<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nama' => $row[1],
            'nama' => $row[2],
            'nama' => $row[3],
            'nama' => $row[4],
            'nama' => $row[5],
        ]);
        $table->string('nama');
        $table->string('masuk');
        $table->string('keluar');
        $table->string('stok');
        $table->string('foto');
    }
}
