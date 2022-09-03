<?php

namespace App\Repository\Panel;

use App\Models\Municipality;
use LazyElePHPant\Repository\Repository;

class MunicipalityRepository extends Repository
{
    public function model()
    {
        return Municipality::class;
    }

    public function data($data)
    {
		$municipalities = $this->getModel()->with('district')
			->select('municipalities.*');

        $datatable = datatables()->eloquent($municipalities);

        $datatable->addColumn('actions', function($municipality) {
			return view('panel.municipalities.table.table-actions', compact('municipality'));
		});

        return $datatable->make(true);
    }
}
