<div class="btn-group btn-group-sm" role="group">
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.districts.edit'))
    <a href="{{ route('panel.districts.edit', ['district' => $district->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.districts.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    @endif
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.districts.destroy'))
    <a href="{{ route('panel.districts.destroy', ['district' => $district->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.districts.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
    @endif
</div>