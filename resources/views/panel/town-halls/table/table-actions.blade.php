<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.town-halls.edit', ['town_hall' => $town_hall->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.town-halls.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    <a href="{{ route('panel.town-halls.destroy', ['town_hall' => $town_hall->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.town-halls.buttons.destroy') }}" class="btn dt-bt-delete">
        <i class="fas fa-trash text-danger"></i>
    </a>
</div>