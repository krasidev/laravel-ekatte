<?php

namespace App\Repository\Panel;

use App\Exports\Panel\RegionsExport;
use App\Models\Region;
use LazyElePHPant\Repository\Repository;
use Maatwebsite\Excel\Facades\Excel;

class RegionRepository extends Repository
{
    public function model()
    {
        return Region::class;
    }

    public function data($data)
    {
		$regions = $this->getModel()->with('districts')
			->select('regions.*');

        $datatable = datatables()->eloquent($regions);

        $datatable->addColumn('actions', function($region) {
			return view('panel.regions.table.table-actions', compact('region'));
		});

        return $datatable->make(true);
    }

    public function export($data)
    {
        return Excel::download(new RegionsExport, 'regions-' . time() . '.xlsx');
    }
}
