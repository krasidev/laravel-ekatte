<div class="btn-group btn-group-sm" role="group">
    @if ($user->trashed())
        <a href="{{ route('panel.users.restore', ['user' => $user->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.restore') }}" class="btn dt-bt-restore">
            <i class="fas fa-trash-restore text-success"></i>
        </a>
        <a href="{{ route('panel.users.force-delete', ['user' => $user->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.destroy') }}" class="btn dt-bt-delete">
            <i class="fas fa-trash text-danger"></i>
        </a>
    @else
        <a href="{{ route('panel.users.edit', ['user' => $user->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.update') }}" class="btn">
            <i class="fas fa-edit text-primary"></i>
        </a>    
        @if (auth()->user()->id != $user->id)
            <a href="{{ route('panel.users.destroy', ['user' => $user->id]) }}" data-dt-toggle="tooltip" data-placement="top" title="{{ __('content.panel.users.buttons.destroy') }}" class="btn dt-bt-delete">
                <i class="fas fa-trash text-warning"></i>
            </a>
        @endif
    @endif
</div>