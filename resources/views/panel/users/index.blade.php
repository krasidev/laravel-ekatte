@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.users.index') }}</div>

    <div class="card-body">
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>{{ __('content.panel.users.table.headers.id') }}</th>
                    <th>{{ __('content.panel.users.table.headers.name') }}</th>
                    <th>{{ __('content.panel.users.table.headers.email') }}</th>
                    <th>{{ __('content.panel.users.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.users.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.users.table.headers.actions') }}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scripts')
@include('scripts.datatables')
<script>
$(function() {
    $('#users-table').DataTable({
        ajax: {
            url: '{!! route('panel.users.data') !!}',
            complete: function (data) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        },
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
        ]
    });
});
</script>
@endsection