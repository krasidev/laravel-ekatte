@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent d-flex align-items-center">
        {{ __('menu.panel.settlements.index') }}
        <div class="btn-group btn-group-sm flex-shrink-0 ml-auto" role="group">
            <button type="button" class="btn p-0" data-toggle="collapse" data-dt-toggle="tooltip" data-placement="left" title="{{ __('content.panel.settlements.buttons.filter') }}" data-target="#settlementsTableFilters" aria-expanded="false" aria-controls="settlementsTableFilters">
                <i class="fas fa-filter text-primary"></i>
            </button>
            <a href="{{ route('panel.settlements.export') }}" class="btn ml-2 p-0" data-dt-toggle="tooltip" data-placement="left" title="{{ __('content.panel.settlements.buttons.export') }}">
                <i class="fas fa-download text-primary"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div id="settlementsTableFilters" class="collapse">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <select name="district_id" id="district_id" class="form-control select2 settlements-table-filters" data-placeholder="{{ __('content.panel.settlements.table.filters.district_id') }}">
                            <option value="">{{ __('content.panel.settlements.table.filters.district_id') }}</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <select name="municipality_id" id="municipality_id" class="form-control select2 settlements-table-filters" data-placeholder="{{ __('content.panel.settlements.table.filters.municipality_id') }}" disabled="disabled">
                            <option value="">{{ __('content.panel.settlements.table.filters.municipality_id') }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <select name="town_hall_id" id="town_hall_id" class="form-control select2 settlements-table-filters" data-placeholder="{{ __('content.panel.settlements.table.filters.town_hall_id') }}" disabled="disabled">
                            <option value="">{{ __('content.panel.settlements.table.filters.town_hall_id') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
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
@include('panel.settlements.shared.filters-script')
<script>
    $(function() {
        var settlementsTableFilters = $('.settlements-table-filters');
        var settlementsTable = $('#settlements-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{!! route('panel.settlements.data') !!}',
                data: function (data) {
                    settlementsTableFilters.each(function(index, element) {
                        data[element.name] = element.value;
                    });

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

        settlementsTableFilters.on('change', function() {
            settlementsTable.draw();
        });
    });
</script>
@endsection
