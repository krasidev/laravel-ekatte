<?php

namespace App\Repository\Panel;

use App\Exports\Panel\SettlementsExport;
use App\Models\Settlement;
use App\Models\TownHall;
use LazyElePHPant\Repository\Repository;
use Maatwebsite\Excel\Facades\Excel;

class SettlementRepository extends Repository
{
    public function model()
    {
        return Settlement::class;
    }

    public function data($data)
    {
		$settlements = $this->getModel()->with([
                'settlement_kind',
                'district',
                'municipality',
                'town_hall'
            ])->select('settlements.*');

        if (request()->district_id) {
            $settlements->where('district_id', request()->district_id);
        }

        if (request()->municipality_id) {
            $settlements->where('municipality_id', request()->municipality_id);
        }

        if (request()->town_hall_id) {
            $settlements->where('town_hall_id', request()->town_hall_id);
        }

        $datatable = datatables()->eloquent($settlements);

        $datatable->addColumn('actions', function($settlement) {
			return view('panel.settlements.table.table-actions', compact('settlement'));
		});

        return $datatable->make(true);
    }

    public function create(array $data)
    {
        if ($townHall = TownHall::find($data['town_hall_id'])) {
            $data['municipality_id'] = $townHall->municipality_id;
            $data['district_id'] = $townHall->municipality->district_id;

            return $this->getModel()->create($data);
        }
    }

    public function show($id)
    {
        return $this->getModel()->with('settlement_kind')->findOrFail($id);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        $settlement = $this->getModel()->findOrFail($id);

        if ($townHall = TownHall::find($data['town_hall_id'])) {
            $data['municipality_id'] = $townHall->municipality_id;
            $data['district_id'] = $townHall->municipality->district_id;
        }

        $settlement->update($data);

        return $settlement;
    }

    public function export($data)
    {
        return Excel::download(new SettlementsExport, 'settlements-' . time() . '.xlsx');
    }
}
