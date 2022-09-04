<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Settlement\StoreSettlementRequest;
use App\Http\Requests\Panel\Settlement\UpdateSettlementRequest;
use App\Models\District;
use App\Models\Municipality;
use App\Models\SettlementKind;
use App\Models\TownHall;
use App\Repository\Panel\SettlementRepository;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    private $repository;

    public function __construct(SettlementRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();

        return view('panel.settlements.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settlementKinds = SettlementKind::all();
        $districts = District::all();
        $municipalities = Municipality::where('district_id', session()->getOldInput('district_id'))->get();
        $townHalls = TownHall::where('municipality_id', session()->getOldInput('municipality_id'))->get();

        return view('panel.settlements.create', compact('settlementKinds', 'districts', 'municipalities', 'townHalls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Settlement\StoreSettlementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettlementRequest $request)
    {
        $this->repository->create($request->only(['ekatte', 'name', 'settlement_kind_id', 'town_hall_id']));

        return redirect()->route('panel.settlements.index')
            ->with('success', [
                'title' => __('messages.panel.settlements.store_success.title'),
                'text' => __('messages.panel.settlements.store_success.text')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settlement = $this->repository->show($id);
        $settlementKinds = SettlementKind::all();
        $districts = District::all();
        $municipalities = Municipality::where('district_id', session()->getOldInput('district_id', $settlement->district_id))->get();
        $townHalls = TownHall::where('municipality_id', session()->getOldInput('municipality_id', $settlement->municipality_id))->get();

        return view('panel.settlements.edit', compact('settlement', 'settlementKinds', 'districts', 'municipalities', 'townHalls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Settlement\UpdateSettlementRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettlementRequest $request, $id)
    {
        $this->repository->update($request->only(['ekatte', 'name', 'settlement_kind_id', 'town_hall_id']), $id);

        return redirect()->route('panel.settlements.index')
            ->with('success', [
                'title' => __('messages.panel.settlements.update_success.title'),
                'text' => __('messages.panel.settlements.update_success.text')
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

    /**
     *  Display table results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        return $this->repository->data($request->all());
    }

    /**
     *  Municipalities data results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dataMunicipalities(Request $request)
    {
        return Municipality::where(function($query) use ($request) {
            if ($request->has('district_id')) {
                $query->where('district_id', $request->get('district_id'));
            }
        })->get();
    }

    /**
     *  Town Halls data results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dataTownHalls(Request $request)
    {
        return TownHall::where(function($query) use ($request) {
            if ($request->has('municipality_id')) {
                $query->where('municipality_id', $request->get('municipality_id'));
            }
        })->get();
    }
}
