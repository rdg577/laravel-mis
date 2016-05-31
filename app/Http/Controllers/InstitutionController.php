<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionRequest;
use App\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $institutions = Institution::orderBy('name', 'asc')->paginate(20);
        return view('sysadmin.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sysadmin.institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InstitutionRequest $request)
    {
        Institution::create($request->all());
        $request->session()->flash('alert-success', 'New institution was successfully added!');
        return redirect('/institutions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $institution = Institution::findOrFail($id);
        return view('sysadmin.institutions.show', compact('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return view('sysadmin.institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(InstitutionRequest $request, $id)
    {
        $institution = Institution::findOrFail($id);
        $institution->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('/institutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Institution::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/institutions');
    }

    public function delete($id)
    {
        $institution = Institution::findOrFail($id);
        return view('sysadmin.institutions.delete', compact('institution'));
    }
}
