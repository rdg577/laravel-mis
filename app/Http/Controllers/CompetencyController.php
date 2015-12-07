<?php

namespace App\Http\Controllers;

use App\Competency;
use App\Http\Requests\CompetencyRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $competencies = Competency::orderBy('name', 'asc')->paginate(7);
        return view('sysadmin.competencies.index', compact('competencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sysadmin.competencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CompetencyRequest $request)
    {
        Competency::create($request->all());
        $request->session()->flash('alert-success', 'New competency was successfully added!');
        return redirect('/competencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $competency = Competency::findOrFail($id);
        return view('sysadmin.competencies.show', compact('competency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $competency = Competency::findOrFail($id);
        return view('sysadmin.competencies.edit', compact('competency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CompetencyRequest $request, $id)
    {
        $competency = Competency::findOrFail($id);
        $competency->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('/competencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        Competency::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('/competencies');
    }

    public function delete($id)
    {
        $competency = Competency::findOrFail($id);
        return view('sysadmin.competencies.delete', compact('competency'));
    }
}
