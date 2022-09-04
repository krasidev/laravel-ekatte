<?php

namespace Database\Seeders;

use App\Models\SettlementKind;
use Illuminate\Database\Seeder;

class SettlementKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettlementKind::upsert([
            [
                'code' => 1,
                'name' => 'град',
                'short_name' => 'гр.'
            ], [
                'code' => 3,
                'name' => 'село',
                'short_name' => 'с.'
            ], [
                'code' => 7,
                'name' => 'манастир',
                'short_name' => 'ман.'
            ]
        ], [
            'code'
        ], [
            'name',
            'short_name'
        ]);
    }
}
