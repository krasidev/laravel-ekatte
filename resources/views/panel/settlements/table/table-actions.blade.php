<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.settlements.edit', ['settlement' => $settlement->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.settlements.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    <a href="{{ route('panel.settlements.destroy', ['settlement' => $settlement->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.settlements.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
</div>