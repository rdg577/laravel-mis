<?php

namespace App\Http\Controllers;

use App\Http\Requests\OccupationRequest;
use App\Occupation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $occupations = Occupation::orderBy('name', 'asc')->paginate(7);
        return view('sysadmin.occupations.index', compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sysadmin.occupations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(OccupationRequest $request)
    {
        Occupation::create($request->all());
        $request->session()->flash('alert-success', 'New occupation was successfully added!');
        return redirect('/occupations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $occupation = Occupation::findOrFail($id);
        return view('sysadmin.occupations.show', compact('occupation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $occupation = Occupation::findOrFail($id);
        return view('sysadmin.occupations.edit', compact('occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(OccupationRequest $request, $id)
    {
        $occupation = Occupation::findOrFail($id);
        $occupation->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('/occupations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Occupation::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/occupations');
    }

    public function delete($id)
    {
        $occupation = Occupation::findOrFail($id);
        return view('sysadmin.occupations.delete', compact('occupation'));
    }
}
