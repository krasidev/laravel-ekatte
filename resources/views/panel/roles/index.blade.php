@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.roles.index') }}</div>

    <div class="card-body">
        <table id="roles-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.roles.table.headers.id') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.name') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.guard_name') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.readonly') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.roles.table.headers.actions') }}</th>
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
        $('#roles-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.roles.data') !!}',
                data: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip('dispose');
                },
                complete: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip();
                }
            },
            columns: [
                { data: 'id', name: 'id', searchable: false },
                { data: 'name', name: 'name' },
                { data: 'guard_name', name: 'guard_name' },
                { data: 'readonly', name: 'readonly' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
