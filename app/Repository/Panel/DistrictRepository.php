<?php

namespace App\Repository\Panel;

use App\Exports\Panel\DistrictsExport;
use App\Models\District;
use LazyElePHPant\Repository\Repository;
use Maatwebsite\Excel\Facades\Excel;

class DistrictRepository extends Repository
{
    public function model()
    {
        return District::class;
    }

    public function data($data)
    {
		$districts = $this->getModel()->with([
            'region',
            'municipalities'
        ])->select('districts.*');

        $datatable = datatables()->eloquent($districts);

        $datatable->addColumn('actions', function($district) {
			return view('panel.districts.table.table-actions', compact('district'));
		});

        return $datatable->make(true);
    }

    public function export($data)
    {
        return Excel::download(new DistrictsExport, 'districts-' . time() . '.xlsx');
    }
}
