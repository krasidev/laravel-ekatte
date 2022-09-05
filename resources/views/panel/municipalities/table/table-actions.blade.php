<div class="btn-group btn-group-sm" role="group">
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.municipalities.edit'))
        <a href="{{ route('panel.municipalities.edit', ['municipality' => $municipality->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.municipalities.buttons.update') }}" class="btn">
            <i class="fas fa-edit text-primary"></i>
        </a>
    @endif
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.municipalities.destroy'))
        @if ($municipality->townHalls->isEmpty())
            <a href="{{ route('panel.municipalities.destroy', ['municipality' => $municipality->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.municipalities.buttons.destroy') }}" class="btn dt-bt-delete">
                <i class="fas fa-trash text-danger"></i>
            </a>
        @else
            <a href="#" class="btn disabled">
                <i class="fas fa-trash text-muted"></i>
            </a>
        @endif
    @endif
</div>