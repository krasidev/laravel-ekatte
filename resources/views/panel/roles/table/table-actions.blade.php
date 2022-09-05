@if ($role->readonly == 0)
<div class="btn-group btn-group-sm" role="group">
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.roles.edit'))
        <a href="{{ route('panel.roles.edit', ['role' => $role->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.roles.buttons.update') }}" class="btn">
            <i class="fas fa-edit text-primary"></i>
        </a>
    @endif
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.roles.destroy'))
        <a href="{{ route('panel.roles.destroy', ['role' => $role->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.roles.buttons.destroy') }}" class="btn dt-bt-delete">
            <i class="fas fa-trash text-danger"></i>
        </a>
    @endif
</div>
@endif