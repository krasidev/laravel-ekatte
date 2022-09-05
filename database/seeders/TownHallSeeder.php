<?php

namespace Database\Seeders;

use App\Imports\TownHallsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class TownHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new TownHallsImport, base_path('database/data/Ek_kmet.xlsx'));
    }
}
