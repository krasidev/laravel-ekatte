<?php

namespace App\Repository\Panel;

use App\Exports\Panel\TownHallsExport;
use App\Models\TownHall;
use LazyElePHPant\Repository\Repository;
use Maatwebsite\Excel\Facades\Excel;

class TownHallRepository extends Repository
{
    public function model()
    {
        return TownHall::class;
    }

    public function data($data)
    {
		$townHalls = $this->getModel()->with([
            'municipality',
            'settlements'
        ])->select('town_halls.*');

        $datatable = datatables()->eloquent($townHalls);

        $datatable->addColumn('actions', function($town_hall) {
			return view('panel.town-halls.table.table-actions', compact('town_hall'));
		});

        return $datatable->make(true);
    }

    public function export($data)
    {
        return Excel::download(new TownHallsExport, 'town-halls-' . time() . '.xlsx');
    }
}
