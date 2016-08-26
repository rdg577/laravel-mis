<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\ReportDateRequest;
use App\ReportDate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ReportDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
//        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
        $report_dates = ReportDate::where('user_id', $user->id)->orderBy('petsa', 'desc')->paginate(10);
        return view('tviadmin.report_dates.index', ['user' => $user, 'report_dates' => $report_dates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('tviadmin.report_dates.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\ReportDateRequest $request)
    {
        $user = Auth::user();
        ReportDate::create($request->all());
        $request->session()->flash('alert-success', 'New report date was successfully added!');
        return redirect('/report-dates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.report_dates.show', compact('report_date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.report_dates.edit', array('report_date' => $report_date, 'user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ReportDateRequest $request, $id)
    {
        $report_date = ReportDate::findOrFail($id);
        $report_date->update($request->all());
        $request->session()->flash('alert-success', 'Report date was successfully updated!');
        return redirect('/report-dates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        ReportDate::findOrFail($id)->delete();
        $request->session()->flash('alert-success', 'Report date was successfully deleted!');
        return redirect('/report-dates');
    }

    public function delete($id)
    {
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.report_dates.delete', compact('report_date'));
    }
}
