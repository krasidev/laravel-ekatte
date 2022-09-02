@extends('layouts.panel')

@section('content')
<div id="accordionProfile" class="accordion">
    @php
        $collapseUpdatePassword = $errors->has('current_password') || $errors->has('password');
        $collapseUpdateExpanded = !$collapseUpdatePassword;
    @endphp
    <div class="card shadow-sm">
        <div class="card-header bg-transparent d-flex align-items-center" data-toggle="collapse" data-target="#collapseUpdate" aria-expanded="{{ $collapseUpdateExpanded ? 'true' : 'false' }}" aria-controls="collapseUpdate">
            {{ __('menu.panel.profile.edit') }}
            <i class="plus-minus-rotate flex-shrink-0 ml-auto collapsed"></i>
        </div>

        <div id="collapseUpdate" class="collapse @if($collapseUpdateExpanded) show @endif" data-parent="#accordionProfile">
            <div class="card-body">
                <form action="{{ route('panel.profile.update') }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="name">{{ __('content.panel.profile.labels.name') }}: <span class="text-danger">*</span></label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" />

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="email">{{ __('content.panel.profile.labels.email') }}: <span class="text-danger">*</span></label>

                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="dropdown-divider mt-0 mb-3">

                    <button type="submit" class="btn btn-primary">{{ __('content.panel.profile.buttons.update') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-transparent d-flex align-items-center" data-toggle="collapse" data-target="#collapseUpdatePassword" aria-expanded="{{ $collapseUpdatePassword ? 'true' : 'false' }}" aria-controls="collapseUpdatePassword">
            {{ __('menu.panel.profile.edit-password') }}

            <i class="plus-minus-rotate flex-shrink-0 ml-auto collapsed"></i>
        </div>

        <div id="collapseUpdatePassword" class="collapse @if($collapseUpdatePassword) show @endif" data-parent="#accordionProfile">
            <div class="card-body">
                <form action="{{ route('panel.profile.update-password') }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="current_password">{{ __('content.panel.profile.labels.current_password') }}:</label>

                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" />

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="password">{{ __('content.panel.profile.labels.password') }}:</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="password-confirm">{{ __('content.panel.profile.labels.password_confirmation') }}:</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
                            </div>
                        </div>
                    </div>

                    <hr class="dropdown-divider mt-0 mb-3">

                    <button type="submit" class="btn btn-primary">{{ __('content.panel.profile.buttons.update-password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection