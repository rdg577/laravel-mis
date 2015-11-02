<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\InstitutionRequest;
use App\Institution;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        return view('tviadmin.profile.show', compact('institution'));
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
        return view('tviadmin.profile.edit', compact('institution'));
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
        return redirect('/tvi/' . $institution->id . '/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
