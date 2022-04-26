<?php

namespace App\Imports;

use App\Models\FileData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportFileData implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FileData([
            'id' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'size' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
