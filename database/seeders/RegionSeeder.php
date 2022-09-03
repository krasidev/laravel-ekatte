<?php

namespace Database\Seeders;

use App\Imports\RegionsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new RegionsImport, base_path('database/data/Ek_reg2.xlsx'));
    }
}
