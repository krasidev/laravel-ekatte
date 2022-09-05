@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.town-halls.create') }}</div>

    <div class="card-body">
        <form action="{{ route('panel.town-halls.store') }}" method="post" autocomplete="off">
            @csrf

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="code">{{ __('content.panel.town-halls.labels.code') }}: <span class="text-danger">*</span></label>

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
                        <label for="ekatte">{{ __('content.panel.town-halls.labels.ekatte') }}: <span class="text-danger">*</span></label>

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
                        <label for="name">{{ __('content.panel.town-halls.labels.name') }}: <span class="text-danger">*</span></label>

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
                        <label for="municipality_id">{{ __('content.panel.town-halls.labels.municipality_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldMunicipalities = old('municipality_id');
                        @endphp
                        <select name="municipality_id" id="municipality_id" class="form-control select2 @error('municipality_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.town-halls.placeholders.municipality_id') }}">
                            <option value="">{{ __('content.panel.town-halls.placeholders.municipality_id') }}</option>
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
            </div>

            <hr class="dropdown-divider mt-0 mb-3">

            <button type="submit" class="btn btn-primary">{{ __('content.panel.town-halls.buttons.store') }}</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.select2').select2();
</script>
@endsection
