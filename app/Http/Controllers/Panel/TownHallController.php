<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TownHall\StoreTownHallRequest;
use App\Http\Requests\Panel\TownHall\UpdateTownHallRequest;
use App\Models\Municipality;
use App\Repository\Panel\TownHallRepository;
use Illuminate\Http\Request;

class TownHallController extends Controller
{
    private $repository;

    public function __construct(TownHallRepository $repository)
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
        return view('panel.town-halls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities = Municipality::all();

        return view('panel.town-halls.create', compact('municipalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Panel\TownHall\StoreTownHallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownHallRequest $request)
    {
        $this->repository->create($request->only(['code', 'ekatte', 'name', 'municipality_id']));

        return redirect()->route('panel.town-halls.index')
            ->with('success', [
                'title' => __('messages.panel.town-halls.store_success.title'),
                'text' => __('messages.panel.town-halls.store_success.text')
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
        $town_hall = $this->repository->find($id);
        $municipalities = Municipality::all();

        return view('panel.town-halls.edit', compact('town_hall', 'municipalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\TownHall\UpdateTownHallRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownHallRequest $request, $id)
    {
        $this->repository->update($request->only(['code', 'ekatte', 'name', 'municipality_id']), $id);

        return redirect()->route('panel.town-halls.index')
            ->with('success', [
                'title' => __('messages.panel.town-halls.update_success.title'),
                'text' => __('messages.panel.town-halls.update_success.text')
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
