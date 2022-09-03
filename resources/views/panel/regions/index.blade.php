@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.regions.index') }}</div>

    <div class="card-body">
        <table id="regions-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.regions.table.headers.id') }}</th>
                    <th>{{ __('content.panel.regions.table.headers.code') }}</th>
                    <th>{{ __('content.panel.regions.table.headers.name') }}</th>
                    <th>{{ __('content.panel.regions.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.regions.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.regions.table.headers.actions') }}</th>
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
        $('#regions-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.regions.data') !!}',
                data: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip('dispose');
                },
                complete: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip();
                }
            },
            columns: [
                { data: 'id', name: 'id', searchable: false },
                { data: 'code', name: 'code' },
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
