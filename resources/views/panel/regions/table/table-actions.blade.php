<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.regions.edit', ['region' => $region->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.regions.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    <a href="{{ route('panel.regions.destroy', ['region' => $region->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.regions.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
</div>