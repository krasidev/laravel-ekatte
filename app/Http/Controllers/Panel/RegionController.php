<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Region\StoreRegionRequest;
use App\Http\Requests\Panel\Region\UpdateRegionRequest;
use App\Repository\Panel\RegionRepository;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    private $repository;

    public function __construct(RegionRepository $repository)
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
        return view('panel.regions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        $this->repository->create($request->only(['code', 'name']));

        return redirect()->route('panel.regions.index')
            ->with('success', [
                'title' => __('messages.panel.regions.store_success.title'),
                'text' => __('messages.panel.regions.store_success.text')
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
        $region = $this->repository->find($id);

        return view('panel.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, $id)
    {
        $this->repository->update($request->only(['code', 'name']), $id);

        return redirect()->route('panel.regions.index')
            ->with('success', [
                'title' => __('messages.panel.regions.update_success.title'),
                'text' => __('messages.panel.regions.update_success.text'),
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
}
