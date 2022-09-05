<?php

namespace App\Repository\Panel;

use App\Exports\Panel\MunicipalitiesExport;
use App\Models\Municipality;
use LazyElePHPant\Repository\Repository;
use Maatwebsite\Excel\Facades\Excel;

class MunicipalityRepository extends Repository
{
    public function model()
    {
        return Municipality::class;
    }

    public function data($data)
    {
		$municipalities = $this->getModel()->with([
            'district',
            'townHalls'
        ])->select('municipalities.*');

        $datatable = datatables()->eloquent($municipalities);

        $datatable->addColumn('actions', function($municipality) {
			return view('panel.municipalities.table.table-actions', compact('municipality'));
		});

        return $datatable->make(true);
    }

    public function export($data)
    {
        return Excel::download(new MunicipalitiesExport, 'municipalities-' . time() . '.xlsx');
    }
}
