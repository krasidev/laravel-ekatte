<?php

namespace App\Repository\Panel;

use App\Models\Region;
use LazyElePHPant\Repository\Repository;

class RegionRepository extends Repository
{
    public function model()
    {
        return Region::class;
    }

    public function data($data)
    {
		$regions = $this->getModel()
			->select('regions.*');

        $datatable = datatables()->eloquent($regions);

        $datatable->addColumn('actions', function($region) {
			return view('panel.regions.table.table-actions', compact('region'));
		});

        return $datatable->make(true);
    }
}
