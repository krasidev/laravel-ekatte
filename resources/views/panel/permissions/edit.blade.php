@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.permissions.edit') }}</div>

    <div class="card-body">
        <form action="{{ route('panel.permissions.update', ['permission' => $permission->id]) }}" method="post" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">{{ __('content.panel.permissions.labels.name') }}:</label>

                        <input id="name" type="text" class="form-control" value="{{ __('permissions.' . $permission->name) }}" readonly="readonly" />
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="guard_name">{{ __('content.panel.permissions.labels.guard_name') }}:</label>

                        <input id="guard_name" type="text" class="form-control" value="{{ $permission->guard_name }}" readonly="readonly" />
                    </div>
                </div>
            </div>

            <fieldset>
                <label>{{ __('content.panel.permissions.legends.roles') }}:</label>

                <hr class="dropdown-divider mt-0 mb-3">

                <div class="row">
                    @php
                        $oldRoles = old('roles', $permission->rolesIds ?? []);
                    @endphp
                    @foreach ($roles as $role)
                        @php
                            $checked = in_array($role->id, $oldRoles) ? 'checked="checked"' : '';
                        @endphp
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-check-input" id="role-{{ $role->id }}" {{ $checked }} />
                                    <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <hr class="dropdown-divider mt-0 mb-3">

            <button type="submit" class="btn btn-primary">{{ __('content.panel.permissions.buttons.update') }}</button>
        </form>
    </div>
</div>
@endsection
