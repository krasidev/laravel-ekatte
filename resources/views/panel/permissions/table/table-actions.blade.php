<div class="btn-group btn-group-sm" role="group">
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.permissions.edit'))
    <a href="{{ route('panel.permissions.edit', ['permission' => $permission->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.permissions.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    @endif
</div>