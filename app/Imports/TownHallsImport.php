<?php

namespace App\Imports;

use App\Models\Municipality;
use App\Models\TownHall;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TownHallsImport implements ToModel, WithHeadingRow
{
    private $districtCodes;

    public function __construct()
    {
        $this->municipalityCodes = Municipality::pluck('id', 'code');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (isset($this->municipalityCodes[substr($row['kmetstvo'], 0, -3)])) {
            return TownHall::updateOrCreate([
                'code' => $row['kmetstvo']
            ], [
                'ekatte' => $row['center'],
                'name' => $row['name'],
                'municipality_id' => $this->municipalityCodes[substr($row['kmetstvo'], 0, -3)]
            ]);
        }
    }
}
