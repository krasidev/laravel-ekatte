<?php

namespace App\Repository\Panel;

use App\Models\District;
use LazyElePHPant\Repository\Repository;

class DistrictRepository extends Repository
{
    public function model()
    {
        return District::class;
    }

    public function data($data)
    {
		$districts = $this->getModel()->with('region')
			->select('districts.*');

        $datatable = datatables()->eloquent($districts);

        $datatable->addColumn('actions', function($district) {
			return view('panel.districts.table.table-actions', compact('district'));
		});

        return $datatable->make(true);
    }
}
