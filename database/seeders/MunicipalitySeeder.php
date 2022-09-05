<?php

namespace Database\Seeders;

use App\Imports\MunicipalitiesImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new MunicipalitiesImport, base_path('database/data/Ek_obst.xlsx'));
    }
}
