<?php

namespace App\Repository\Panel;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LazyElePHPant\Repository\Repository;

class ProfileRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        $profile = $this->getModel()->findOrFail($id);

        $profile->update($data);

        $profile->syncRoles([$data['role']]);

        return $profile;
    }

    public function updatePassword(array $data, $id)
    {
        $profile = $this->getModel()->findOrFail($id);

        if (Hash::check($data['current_password'], $profile->password)) {
            $profile->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        return $profile;
    }
}
