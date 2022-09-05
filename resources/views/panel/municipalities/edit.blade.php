@extends('layouts.panel')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-transparent">{{ __('menu.panel.municipalities.edit') }}</div>

    <div class="card-body">
        <form action="{{ route('panel.municipalities.update', ['municipality' => $municipality->id]) }}" method="post" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="code">{{ __('content.panel.municipalities.labels.code') }}: <span class="text-danger">*</span></label>

                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $municipality->code) }}" />

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="ekatte">{{ __('content.panel.municipalities.labels.ekatte') }}: <span class="text-danger">*</span></label>

                        <input id="ekatte" type="text" class="form-control @error('ekatte') is-invalid @enderror" name="ekatte" value="{{ old('ekatte', $municipality->ekatte) }}" />

                        @error('ekatte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">{{ __('content.panel.municipalities.labels.name') }}: <span class="text-danger">*</span></label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $municipality->name) }}" />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="district_id">{{ __('content.panel.municipalities.labels.district_id') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldDistricts = old('district_id', $municipality->district_id);
                        @endphp
                        <select name="district_id" id="district_id" class="form-control select2 @error('district_id') is-invalid @enderror" data-placeholder="{{ __('content.panel.municipalities.placeholders.district_id') }}">
                            <option value="">{{ __('content.panel.municipalities.placeholders.district_id') }}</option>
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
            </div>

            <hr class="dropdown-divider mt-0 mb-3">

            <button type="submit" class="btn btn-primary">{{ __('content.panel.municipalities.buttons.update') }}</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.select2').select2();
</script>
@endsection
