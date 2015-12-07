<?php

namespace App\Http\Controllers\TVI;

use App\Institution;
use App\ReportDate;
use App\TVIIndicator1TrainerRatio;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $institution_id = Auth::user()->institution->id;
        $report_dates = ReportDate::where('user_id', Auth::user()->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('tviadmin.indicators.index', array('trainer_ratio' => $trainer_ratio,
                                                        'institution_id' => $institution_id,
                                                        'report_dates' => $report_dates));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
    public function show(Request $request)
    {
        $institution = Institution::findOrFail($request->get('institution_id'));

        $trainer_ratio = new TVIIndicator1TrainerRatio($request->get('institution_id'), $request->get('report_date_id'));

        /*dd($trainer_ratio->levelA()[0]->total);*/

        return view('tviadmin.indicators.show', array('institution' => $institution,
                                                        'trainer_ratio' => $trainer_ratio));
    }


}