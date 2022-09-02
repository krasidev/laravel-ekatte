<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('panel.users.edit', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.update') }}" class="btn">
        <i class="fas fa-edit text-primary"></i>
    </a>
    @if (auth()->user()->id != $user->id)
        <a href="{{ route('panel.users.destroy', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.destroy') }}" class="btn dt-bt-delete">
            <i class="fas fa-trash text-danger"></i>
        </a>
    @endif
</div>