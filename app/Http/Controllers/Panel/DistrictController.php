<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\District\StoreDistrictRequest;
use App\Http\Requests\Panel\District\UpdateDistrictRequest;
use App\Models\Region;
use App\Repository\Panel\DistrictRepository;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    private $repository;

    public function __construct(DistrictRepository $repository)
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
        return view('panel.districts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();

        return view('panel.districts.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Panel\District\StoreDistrictRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $this->repository->create($request->only(['code', 'ekatte', 'name', 'region_id']));

        return redirect()->route('panel.districts.index')
            ->with('success', [
                'title' => __('messages.panel.districts.store_success.title'),
                'text' => __('messages.panel.districts.store_success.text')
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
        $district = $this->repository->find($id);
        $regions = Region::all();

        return view('panel.districts.edit', compact('district', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\District\UpdateDistrictRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrictRequest $request, $id)
    {
        $this->repository->update($request->only(['code', 'ekatte', 'name', 'region_id']), $id);

        return redirect()->route('panel.districts.index')
            ->with('success', [
                'title' => __('messages.panel.districts.update_success.title'),
                'text' => __('messages.panel.districts.update_success.text')
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
     * Export data from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        return $this->repository->export($request->all());
    }
}
