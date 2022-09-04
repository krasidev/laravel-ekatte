<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'readonly' => 1
            ], [
                'name' => 'manager',
                'readonly' => 1,
                'permissions' => [
                    // Settlements
                    'panel.settlements.create',
                    'panel.settlements.edit',
                    'panel.settlements.destroy',
                    // Town-halls
                    'panel.town-halls.index',
                    'panel.town-halls.create',
                    'panel.town-halls.edit',
                    'panel.town-halls.destroy',
                    // Municipalities
                    'panel.municipalities.index',
                    'panel.municipalities.create',
                    'panel.municipalities.edit',
                    'panel.municipalities.destroy',
                    // Districts
                    'panel.districts.index',
                    'panel.districts.create',
                    'panel.districts.edit',
                    'panel.districts.destroy',
                    // Regions
                    'panel.regions.index',
                    'panel.regions.create',
                    'panel.regions.edit',
                    'panel.regions.destroy'
                ]
            ]
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role['name']
            ], [
                'readonly' => $role['readonly']
            ])->syncPermissions($role['permissions'] ?? []);
        }
    }
}
