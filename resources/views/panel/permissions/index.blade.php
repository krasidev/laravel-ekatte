@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.permissions.index') }}</div>

    <div class="card-body">
        <table id="permissions-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.permissions.table.headers.id') }}</th>
                    <th>{{ __('content.panel.permissions.table.headers.name') }}</th>
                    <th>{{ __('content.panel.permissions.table.headers.guard_name') }}</th>
                    <th>{{ __('content.panel.permissions.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.permissions.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.permissions.table.headers.actions') }}</th>
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
        $('#permissions-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.permissions.data') !!}',
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
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
