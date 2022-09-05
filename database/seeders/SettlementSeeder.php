<?php

namespace Database\Seeders;

use App\Imports\SettlementsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SettlementsImport, base_path('database/data/Ek_atte.xlsx'));
    }
}
