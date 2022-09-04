@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.settlements.index') }}</div>

    <div class="card-body">
        <table id="settlements-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.settlements.table.headers.id') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.ekatte') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.settlement_kind.name') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.name') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.district.name') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.municipality.name') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.town_hall.name') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.settlements.table.headers.actions') }}</th>
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
        $('#settlements-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.settlements.data') !!}',
                data: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip('dispose');
                },
                complete: function (data) {
                    $('[data-dt-toggle="tooltip"]').tooltip();
                }
            },
            columns: [
                { data: 'id', name: 'id', searchable: false },
                { data: 'ekatte', name: 'ekatte' },
                { data: 'settlement_kind.name', name: 'settlement_kind.name' },
                { data: 'name', name: 'name' },
                { data: 'district.name', name: 'district.name' },
                { data: 'municipality.name', name: 'municipality.name' },
                { data: 'town_hall.name', name: 'town_hall.name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
