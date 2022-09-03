<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Municipality;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MunicipalitiesImport implements ToModel, WithHeadingRow
{
    private $districtCodes;

    public function __construct()
    {
        $this->districtCodes = District::pluck('id', 'code');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (isset($this->districtCodes[substr($row['obstina'], 0, -2)])) {
            return Municipality::updateOrCreate([
                'code' => $row['obstina']
            ], [
                'ekatte' => $row['ekatte'],
                'name' => $row['name'],
                'district_id' => $this->districtCodes[substr($row['obstina'], 0, -2)]
            ]);
        }
    }
}
