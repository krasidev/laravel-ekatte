<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Profile\UpdatePasswordProfileRequest;
use App\Http\Requests\Panel\Profile\UpdateProfileRequest;
use App\Models\Role;
use App\Repository\Panel\ProfileRepository;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $roles = Role::all();

        return view('panel.profile.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Profile\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->repository->update($request->only(['name', 'email', 'role']), auth()->user()->id);

        return redirect()->route('panel.profile.edit')
            ->with('success', [
                'title' => __('messages.panel.profile.update_success.title'),
                'text' => __('messages.panel.profile.update_success.text')
            ]);
    }

    /**
     * Update password in storage.
     *
     * @param  \App\Http\Requests\Panel\Profile\UpdatePasswordProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordProfileRequest $request)
    {
        $this->repository->updatePassword($request->only(['current_password', 'password']), auth()->user()->id);

        return redirect()->route('panel.profile.edit')
            ->with('success', [
                'title' => __('messages.panel.profile.update_password_success.title'),
                'text' => __('messages.panel.profile.update_password_success.text')
            ]);
    }
}
