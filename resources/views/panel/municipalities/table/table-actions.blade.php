<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.municipalities.edit', ['municipality' => $municipality->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.municipalities.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    <a href="{{ route('panel.municipalities.destroy', ['municipality' => $municipality->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.municipalities.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
</div>