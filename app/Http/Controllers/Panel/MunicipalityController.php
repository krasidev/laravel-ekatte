<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Municipality\StoreMunicipalityRequest;
use App\Http\Requests\Panel\Municipality\UpdateMunicipalityRequest;
use App\Models\District;
use App\Repository\Panel\MunicipalityRepository;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    private $repository;

    public function __construct(MunicipalityRepository $repository)
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
        return view('panel.municipalities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();

        return view('panel.municipalities.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Municipality\StoreMunicipalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipalityRequest $request)
    {
        $this->repository->create($request->only(['code', 'ekatte', 'name', 'district_id']));

        return redirect()->route('panel.municipalities.index')
            ->with('success', [
                'title' => __('messages.panel.municipalities.store_success.title'),
                'text' => __('messages.panel.municipalities.store_success.text')
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
        $municipality = $this->repository->find($id);
        $districts = District::all();

        return view('panel.municipalities.edit', compact('municipality', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Municipality\UpdateMunicipalityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMunicipalityRequest $request, $id)
    {
        $this->repository->update($request->only(['code', 'ekatte', 'name', 'district_id']), $id);

        return redirect()->route('panel.municipalities.index')
            ->with('success', [
                'title' => __('messages.panel.municipalities.update_success.title'),
                'text' => __('messages.panel.municipalities.update_success.text'),
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
