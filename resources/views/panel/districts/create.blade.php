@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.districts.create') }}</div>

    <div class="card-body">
        <form action="{{ route('panel.districts.store') }}" method="post" autocomplete="off">
            @csrf

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="code">{{ __('content.panel.districts.labels.code') }}: <span class="text-danger">*</span></label>

                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" />

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="ekatte">{{ __('content.panel.districts.labels.ekatte') }}: <span class="text-danger">*</span></label>

                        <input id="ekatte" type="text" class="form-control @error('ekatte') is-invalid @enderror" name="ekatte" value="{{ old('ekatte') }}" />

                        @error('ekatte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">{{ __('content.panel.districts.labels.name') }}: <span class="text-danger">*</span></label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="region_id">{{ __('content.panel.districts.labels.region_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldRegions = old('region_id');
                        @endphp
                        <select name="region_id" id="region_id" class="form-control select2 @error('region_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.districts.placeholders.region_id') }}">
                            <option value="">{{ __('content.panel.districts.placeholders.region_id') }}</option>
                            @foreach($regions as $region)
                                @php
                                    $selected = $region->id == $oldRegions ? 'selected="selected"' : '';
                                @endphp
                                <option value="{{ $region->id }}" {{ $selected }}>{{ $region->name }}</option>
                            @endforeach
                        </select>

                        @error('region_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="dropdown-divider mt-0 mb-3">

            <button type="submit" class="btn btn-primary">{{ __('content.panel.districts.buttons.store') }}</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.select2').select2();
</script>
@endsection
