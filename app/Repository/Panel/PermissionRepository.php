<?php

namespace App\Repository\Panel;

use App\Models\Permission;
use App\Models\Role;
use LazyElePHPant\Repository\Repository;

class PermissionRepository extends Repository
{
    public function model()
    {
        return Permission::class;
    }

    public function data($data)
    {
		$permissions = $this->getModel()
			->select('permissions.*');

        $datatable = datatables()->eloquent($permissions);

        $datatable->editColumn('name', function($permission) {
            return __('permissions.' . $permission->name);
		});

        $datatable->addColumn('actions', function($permission) {
			return view('panel.permissions.table.table-actions', compact('permission'));
		});

        return $datatable->make(true);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        $permission = $this->getModel()->findOrFail($id);
        $readonlyRoles = $permission->roles->where('readonly', 1)->pluck('id')->toArray();
        $role = Role::whereIn('id', $data['roles'] ?? [])->where('readonly', 0)->pluck('id')->toArray();

        $permission->syncRoles(array_merge(
            $readonlyRoles,
            $role
        ));

        return $permission;
    }
}
