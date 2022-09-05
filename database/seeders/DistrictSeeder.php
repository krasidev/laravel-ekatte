<?php

namespace Database\Seeders;

use App\Imports\DistrictsImport;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DistrictsImport, base_path('database/data/Ek_obl.xlsx'));
    }
}
