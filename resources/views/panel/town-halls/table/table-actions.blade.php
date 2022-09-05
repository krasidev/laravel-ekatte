<div class="btn-group btn-group-sm" role="group">
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.town-halls.edit'))
        <a href="{{ route('panel.town-halls.edit', ['town_hall' => $town_hall->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.town-halls.buttons.update') }}" class="btn">
            <i class="fas fa-edit text-primary"></i>
        </a>
    @endif
    @if (auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo('panel.town-halls.destroy'))
        @if ($town_hall->settlements->isEmpty())
            <a href="{{ route('panel.town-halls.destroy', ['town_hall' => $town_hall->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.town-halls.buttons.destroy') }}" class="btn dt-bt-delete">
                <i class="fas fa-trash text-danger"></i>
            </a>
        @else
            <a href="#" class="btn disabled">
                <i class="fas fa-trash text-muted"></i>
            </a>
        @endif
    @endif
</div>