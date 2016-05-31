<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Sector;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sectors = Sector::orderBy('name', 'asc')->paginate(20);
        return view('sysadmin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sysadmin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SectorRequest $request)
    {
        Sector::create($request->all());
        $request->session()->flash('alert-success', 'New sector was successfully added!');
        return redirect('/sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sysadmin.sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sysadmin.sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SectorRequest $request, $id)
    {
        $sector = Sector::findOrFail($id);
        $sector->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('/sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Sector::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/sectors');
    }

    public function delete($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sysadmin.sectors.delete', compact('sector'));
    }
}
