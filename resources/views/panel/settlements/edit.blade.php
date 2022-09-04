@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.settlements.create') }}</div>

    <div class="card-body">
        <form action="{{ route('panel.settlements.update', ['settlement' => $settlement->id]) }}" method="post" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="ekatte">{{ __('content.panel.settlements.labels.ekatte') }}: <span class="text-danger">*</span></label>

                        <input id="ekatte" type="text" class="form-control @error('ekatte') is-invalid @enderror" name="ekatte" value="{{ old('ekatte', $settlement->ekatte) }}" />

                        @error('ekatte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="settlement_kind_id">{{ __('content.panel.settlements.labels.settlement_kind_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldSettlementKinds = old('settlement_kind_id', $settlement->settlement_kind_id);
                        @endphp
                        <select name="settlement_kind_id" id="settlement_kind_id" class="form-control select2 @error('settlement_kind_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.settlements.placeholders.settlement_kind_id') }}">
                            <option value="">{{ __('content.panel.settlements.placeholders.settlement_kind_id') }}</option>
                            @foreach($settlementKinds as $settlementKind)
                                @php
                                    $selected = $settlementKind->id == $oldSettlementKinds ? 'selected="selected"' : '';
                                @endphp
                                <option value="{{ $settlementKind->id }}" {{ $selected }}>{{ $settlementKind->name }}</option>
                            @endforeach
                        </select>

                        @error('settlement_kind_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">{{ __('content.panel.settlements.labels.name') }}: <span class="text-danger">*</span></label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $settlement->name) }}" />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="district_id">{{ __('content.panel.settlements.labels.district_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldDistricts = old('district_id', $settlement->district_id);
                        @endphp
                        <select name="district_id" id="district_id" class="form-control select2 @error('district_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.settlements.placeholders.district_id') }}">
                            <option value="">{{ __('content.panel.settlements.placeholders.district_id') }}</option>
                            @foreach($districts as $district)
                                @php
                                    $selected = $district->id == $oldDistricts ? 'selected="selected"' : '';
                                @endphp
                                <option value="{{ $district->id }}" {{ $selected }}>{{ $district->name }}</option>
                            @endforeach
                        </select>

                        @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="municipality_id">{{ __('content.panel.settlements.labels.municipality_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldMunicipalities = old('municipality_id', $settlement->municipality_id);
                        @endphp
                        <input type="hidden" name="municipality_id" value="">
                        <select name="municipality_id" id="municipality_id" class="form-control select2 @error('municipality_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.settlements.placeholders.municipality_id') }}" @if($municipalities->isEmpty()) disabled="disabled" @endif>
                            <option value="">{{ __('content.panel.settlements.placeholders.municipality_id') }}</option>
                            @foreach($municipalities as $municipality)
                                @php
                                    $selected = $municipality->id == $oldMunicipalities ? 'selected="selected"' : '';
                                @endphp
                                <option value="{{ $municipality->id }}" {{ $selected }}>{{ $municipality->name }}</option>
                            @endforeach
                        </select>

                        @error('municipality_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="town_hall_id">{{ __('content.panel.settlements.labels.town_hall_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldTownHalls = old('town_hall_id', $settlement->town_hall_id);
                        @endphp
                        <input type="hidden" name="town_hall_id" value="">
                        <select name="town_hall_id" id="town_hall_id" class="form-control select2 @error('town_hall_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.settlements.placeholders.town_hall_id') }}" @if($townHalls->isEmpty()) disabled="disabled" @endif>
                            <option value="">{{ __('content.panel.settlements.placeholders.town_hall_id') }}</option>
                            @foreach($townHalls as $townHall)
                                @php
                                    $selected = $townHall->id == $oldTownHalls ? 'selected="selected"' : '';
                                @endphp
                                <option value="{{ $townHall->id }}" {{ $selected }}>{{ $townHall->name }}</option>
                            @endforeach
                        </select>

                        @error('town_hall_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="dropdown-divider mt-0 mb-3">

            <button type="submit" class="btn btn-primary">{{ __('content.panel.settlements.buttons.store') }}</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@include('panel.settlements.shared.create-edit-script')
@endsection
