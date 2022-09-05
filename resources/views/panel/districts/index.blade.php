@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent d-flex align-items-center">
        {{ __('menu.panel.districts.index') }}
        <div class="btn-group btn-group-sm flex-shrink-0 ml-auto" role="group">
            <a href="{{ route('panel.districts.export') }}" class="btn p-0" data-dt-toggle="tooltip" data-placement="left" title="{{ __('content.panel.districts.buttons.export') }}">
                <i class="fas fa-download text-primary"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="districts-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>{{ __('content.panel.districts.table.headers.id') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.code') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.ekatte') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.name') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.region.name') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.created_at') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.updated_at') }}</th>
                    <th>{{ __('content.panel.districts.table.headers.actions') }}</th>
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
        $('#districts-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.districts.data') !!}',
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
                { data: 'region.name', name: 'region.name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'actions', name: 'actions', searchable: false, orderable: false, className: 'py-2' }
            ]
        });
    });
</script>
@endsection
