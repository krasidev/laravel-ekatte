@if ($role->readonly == 0)
<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.roles.edit', ['role' => $role->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.roles.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    <a href="{{ route('panel.roles.destroy', ['role' => $role->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.roles.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
</div>
@endif