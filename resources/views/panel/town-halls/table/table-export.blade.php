@php
    $thStyle = 'background-color: #007bff; color: #ffffff;';
    $tdStyle = '';
@endphp
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table>
        <thead>
            <tr>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.code') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.ekatte') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.town-halls.municipality.name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($townHalls as $town_hall)
            <tr>
                <td style="{{ $tdStyle }}">{{ $town_hall->code }}</td>
                <td style="{{ $tdStyle }}">{{ $town_hall->ekatte }}</td>
                <td style="{{ $tdStyle }}">{{ $town_hall->name }}</td>
                <td style="{{ $tdStyle }}">{{ $town_hall->municipality->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</html>