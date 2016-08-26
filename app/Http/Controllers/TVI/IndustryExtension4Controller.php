<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\IndustryExtension4Request;
use App\IndustryExtension4;
use App\ReportDate;
use App\Sector;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class IndustryExtension4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->paginate(10);
        return view('tviadmin.industry_extension4s.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');
        $sectors = Sector::all()->lists('name', 'id');

        return view('tviadmin.industry_extension4s.create', array('report_dates' => $report_dates,
            'report_date_id' => Input::get('id'),
            'sectors' => $sectors,
            'institution_id' => $user->institution->id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(IndustryExtension4Request $request)
    {
        IndustryExtension4::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('industry-extension-4/' . $request->get('report_date_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $id, 'institution_id' => $user->institution->id);
        $industry_extension4s = IndustryExtension4::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.industry_extension4s.index2', array('industry_extension4s' => $industry_extension4s,
            'report_date' => $report_date));
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
        $report_dates = ReportDate::lists('petsa', 'id');
        $industry_extension4 = IndustryExtension4::findOrFail($id);
        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($industry_extension4->subsector->id)->lists('name', 'id');

        return view('tviadmin.industry_extension4s.edit',
            array('industry_extension4' => $industry_extension4,
                'report_dates' => $report_dates,
                'sectors' => $sectors,
                'subsectors' => $subsectors));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(IndustryExtension4Request $request, $id)
    {
        $industry_extension4 = IndustryExtension4::findOrFail($id);
        $industry_extension4->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('industry-extension-4/' . $industry_extension4->report_date->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $industry_extension4 = IndustryExtension4::findOrFail($id);
        $report_id = $industry_extension4->report_date->id;
        $industry_extension4->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('industry-extension-4/' . $report_id);
    }

    public function delete($id)
    {
        $industry_extension4 = IndustryExtension4::findOrFail($id);
        return view('tviadmin.industry_extension4s.delete', array('industry_extension4' => $industry_extension4));
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        $report_dates = ReportDate::orderBy('petsa', 'desc')
            ->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.industry_extension4s.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        // retrieve all records as collection
        $records = IndustryExtension4::select(
            'report_date_id',
            'institution_id',
            'subsector_id',
            'short_term_male',
            'short_term_female',
            'level1n2_male',
            'level1n2_female',
            'level3n4_male',
            'level3n4_female',
            'operator_male',
            'operator_female',
            'mse',
            'remarks'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            IndustryExtension4::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found from source.');
        }

        return redirect('industry-extension-4');
    }
}
