@php
    $thStyle = 'background-color: #007bff; color: #ffffff;';
    $tdStyle = '';
@endphp
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table>
        <thead>
            <tr>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.ekatte') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.settlement_kind.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.district.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.municipality.name') }}</th>
                <th style="{{ $thStyle }}">{{ __('exports.panel.settlements.town_hall.name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settlements as $settlement)
            <tr>
                <td style="{{ $tdStyle }}">{{ $settlement->ekatte }}</td>
                <td style="{{ $tdStyle }}">{{ $settlement->settlement_kind->name }}</td>
                <td style="{{ $tdStyle }}">{{ $settlement->name }}</td>
                <td style="{{ $tdStyle }}">{{ $settlement->district->name }}</td>
                <td style="{{ $tdStyle }}">{{ $settlement->municipality->name }}</td>
                <td style="{{ $tdStyle }}">{{ $settlement->town_hall->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</html>