<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementKind;
use App\Models\TownHall;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SettlementsImport implements ToModel, WithHeadingRow
{
    private $settlementKindCodes;
    private $districtCodes;
    private $municipalityCodes;
    private $townHallCodes;

    public function __construct()
    {
        $this->settlementKindCodes = SettlementKind::pluck('id', 'code');
        $this->districtCodes = District::pluck('id', 'code');
        $this->municipalityCodes = Municipality::pluck('id', 'code');
        $this->townHallCodes = TownHall::pluck('id', 'code');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (
            isset($this->settlementKindCodes[$row['kind']]) &&
            isset($this->districtCodes[$row['oblast']]) &&
            isset($this->municipalityCodes[$row['obstina']]) &&
            isset($this->townHallCodes[$row['kmetstvo']])
        ) {
            return Settlement::updateOrCreate([
                'ekatte' => $row['ekatte']
            ], [
                'name' => $row['name'],
                'settlement_kind_id' => $this->settlementKindCodes[$row['kind']],
                'district_id' => $this->districtCodes[$row['oblast']],
                'municipality_id' => $this->municipalityCodes[$row['obstina']],
                'town_hall_id' => $this->townHallCodes[$row['kmetstvo']]
            ]);
        }
    }
}
