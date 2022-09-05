@php
    $thStyle = 'background-color: #007bff; color: #ffffff;';
    $tdStyle = '';
@endphp
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table>
        <thead>
            <tr>
                <th style="{{ $thStyle }}">{{ __('exports.panel.regions.code') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.regions.name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $region)
            <tr>
                <td style="{{ $tdStyle }}">{{ $region->code }}</td>
                <td style="{{ $tdStyle }}">{{ $region->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</html>