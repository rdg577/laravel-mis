<?php

namespace App\Http\Controllers;

use App\Subsector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubsectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subsectors = Subsector::paginate(7);
        return view('sysadmin.subsectors.index', compact('subsectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sysadmin.subsectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\SubsectorRequest $request)
    {
        Subsector::create($request->all());
        $request->session()->flash('alert-success', 'New sub-sector was successfully added!');
        return redirect('/subsectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $subsector = Subsector::findOrFail($id);
        return view('sysadmin.subsectors.show', compact('subsector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $subsector = Subsector::findOrFail($id);
        return view('sysadmin.subsectors.edit', compact('subsector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\SubsectorRequest $request, $id)
    {
        $subsector = Subsector::findOrFail($id);
        $subsector->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('/subsectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Subsector::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/subsectors');
    }

    public function delete($id)
    {
        $subsector = Subsector::findOrFail($id);
        return view('sysadmin.subsectors.delete', compact('subsector'));
    }
}
