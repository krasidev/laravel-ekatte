@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent d-flex align-items-center">
        {{ __('menu.panel.municipalities.index') }}
        <div class="btn-group btn-group-sm flex-shrink-0 ml-auto" role="group">
            <a href="{{ route('panel.municipalities.export') }}" class="btn p-0" data-dt-toggle="tooltip" data-placement="left" title="{{ __('content.panel.municipalities.buttons.export') }}">
                <i class="fas fa-download text-primary"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="municipalities-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.municipalities.table.headers.id') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.code') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.ekatte') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.name') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.district.name') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.municipalities.table.headers.actions') }}</th>
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
        $('#municipalities-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.municipalities.data') !!}',
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
                { data: 'ekatte', name: 'ekatte' },
                { data: 'name', name: 'name' },
                { data: 'district.name', name: 'district.name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
