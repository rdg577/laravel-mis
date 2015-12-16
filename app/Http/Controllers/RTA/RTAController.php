<?php

namespace App\Http\Controllers\RTA;

use App\Institution;
use App\Region;
use App\ReportDate;
use App\RTAIndicatorStudentRatio;
use App\RTAIndicatorTrainerRatio;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RTAController extends Controller
{
    public function institutions()
    {
        $user = Auth::user();

        $institutions = Institution::where('region_id', $user->region_id)->orderBy('name')->get();
        $region = Region::find($user->region_id);

        return view('rtaadmin.institutions', compact('institutions', 'region'));
    }

    public function indicators()
    {
        $user = Auth::user();

        // get report dates
        $report_dates = ReportDate::whereIn('user_id', User::select('id')->where('region_id', $user->region_id)->lists('id'))
            ->distinct()->orderBy('petsa', 'desc')
            ->lists('petsa', 'petsa');

        return view('rtaadmin.indicators', compact('report_dates'));
    }

    public function show_indicators(Request $request)
    {
        $user = Auth::user();

        $region = Region::findOrFail($user->region_id);

        $trainer_ratio = new RTAIndicatorTrainerRatio($request->get('petsa'), $user->region_id);

        $student_ratio = new RTAIndicatorStudentRatio($request->get('petsa'), $user->region_id);

        $petsa = $request->get('petsa');

        return view('rtaadmin.show', compact('trainer_ratio', 'student_ratio', 'region', 'petsa'));
    }

}
