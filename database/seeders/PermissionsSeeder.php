<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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
            'panel.regions.destroy',
            // Users
            'panel.users.index',
            'panel.users.create',
            'panel.users.edit',
            'panel.users.destroy',
            'panel.users.restore',
            'panel.users.force-delete',
            // Roles
            'panel.roles.index',
            'panel.roles.create',
            'panel.roles.edit',
            'panel.roles.destroy',
            // Permissions
            'panel.permissions.index',
            'panel.permissions.edit'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ]);
        }
    }
}
