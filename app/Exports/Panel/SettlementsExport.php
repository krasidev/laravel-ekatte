<?php

namespace App\Exports\Panel;

use App\Models\Settlement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class SettlementsExport extends DefaultValueBinder implements FromView, ShouldAutoSize, WithCustomValueBinder
{
    public function bindValue(Cell $cell, $value)
    {
        if ($cell->getColumn() == 'A') {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        return parent::bindValue($cell, $value);
    }

    public function view(): View
    {
        return view('panel.settlements.table.table-export', [
            'settlements' => Settlement::with([
                'settlement_kind',
                'district',
                'municipality',
                'town_hall'
            ])->get()
        ]);
    }
}
