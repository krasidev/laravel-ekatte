@php
    $thStyle = 'background-color: #007bff; color: #ffffff;';
    $tdStyle = '';
@endphp
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table>
        <thead>
            <tr>
                <th style="{{ $thStyle }}">{{ __('exports.panel.districts.code') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.districts.ekatte') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.districts.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.districts.region.name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($districts as $district)
            <tr>
                <td style="{{ $tdStyle }}">{{ $district->code }}</td>
                <td style="{{ $tdStyle }}">{{ $district->ekatte }}</td>
                <td style="{{ $tdStyle }}">{{ $district->name }}</td>
                <td style="{{ $tdStyle }}">{{ $district->region->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</html>