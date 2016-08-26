<?php

namespace App\Http\Controllers\TVI;

use App\Http\Requests\SavingTransfereeRequest;
use App\Occupation;
use App\ReportDate;
use App\SavingTransferee;
use App\Sector;
use App\Subsector;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SavingTransfereeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->paginate(10);
        return view('tviadmin.saving_transferees.index', compact('report_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $institution_id = $user->institution_id;
        $sectors = Sector::all()->lists('name', 'id');
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->orderBy('petsa', 'desc')->lists('petsa', 'id');

        return view('tviadmin.saving_transferees.create', compact('report_dates', 'sectors', 'institution_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavingTransfereeRequest $request)
    {
        SavingTransferee::create($request->all());
        $request->session()->flash('alert-success', 'New record was successfully added!');
        return redirect('saving-transferees/' . $request->get('report_date_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $id, 'institution_id' => $user->institution->id);
        $saving_transferees = SavingTransferee::where($criteria)->paginate(10);
        $report_date = ReportDate::findOrFail($id);

        return view('tviadmin.saving_transferees.index2', array('saving_transferees' => $saving_transferees,
            'report_date' => $report_date));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report_dates = ReportDate::lists('petsa', 'id');
        $saving_transferee = SavingTransferee::findOrFail($id);

        $sectors = Sector::all()->lists('name', 'id');
        $subsectors = Subsector::findOrFail($saving_transferee->subsector->id)->lists('name', 'id');

        return view('tviadmin.saving_transferees.edit', compact('saving_transferee', 'sectors', 'subsectors', 'report_dates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $saving_transferee = SavingTransferee::findOrFail($id);
        $saving_transferee->update($request->all());
        $request->session()->flash('alert-success', 'Update was successful!');
        return redirect('saving-transferees/' . $saving_transferee->report_date->id);
    }

    public function delete($id)
    {
        $saving_transferee = SavingTransferee::findOrFail($id);
        return view('tviadmin.saving_transferees.delete', compact('saving_transferee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $saving_transferee = SavingTransferee::findOrFail($id);
        $report_id = $saving_transferee->report_date->id;
        $saving_transferee->delete();
        $request->session()->flash('alert-success', 'Deletion was successful!');
        return redirect('saving-transferees/' . $report_id);
    }

    public function saveAsForm($id)
    {
        $user = Auth::user();
        // determine the user_id of the Regional Administrator
        $region_administrator = User::where('user_type', 'Region Administrator')
            ->where('active', true)
            ->where('region_id', $user->region->id)->first();
        $report_dates = ReportDate::where('user_id', $region_administrator->id)->lists('petsa', 'id');
        $report_date = ReportDate::findOrFail($id);
        return view('tviadmin.saving_transferees.save_as', array('report_dates' => $report_dates,
            'report_date' => $report_date,
            'institution_id' => $user->institution->id));
    }

    public function saveAs(Request $request)
    {
        $user = Auth::user();
        $criteria = array('report_date_id' => $request->report_date_id_target, 'institution_id' => $user->institution->id);
        $target_report_id_exist = SavingTransferee::where($criteria)->get();

        if(count($target_report_id_exist) > 0) {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save-as report operation failed. Target report already exists.');

            return redirect('saving-transferees');
        }


        // retrieve all records as collection
        $records = SavingTransferee::select(
            'report_date_id'            ,
            'institution_id'            ,
            'subsector_id'                       ,
            'regular_level1_to_level2_male'       ,
            'regular_level1_to_level2_female'     ,
            'regular_level2_to_level3_male'       ,
            'regular_level2_to_level3_female'     ,
            'regular_level3_to_level4_male'       ,
            'regular_level3_to_level4_female'     ,
            'regular_level4_to_level5_male'       ,
            'regular_level4_to_level5_female'     ,
            'extension_level1_to_level2_male'     ,
            'extension_level1_to_level2_female'   ,
            'extension_level2_to_level3_male'     ,
            'extension_level2_to_level3_female'   ,
            'extension_level3_to_level4_male'     ,
            'extension_level3_to_level4_female'   ,
            'extension_level4_to_level5_male'     ,
            'extension_level4_to_level5_female'
        )->where('report_date_id', $request->report_date_id_source)->get();

        if(count($records) > 0) {
            // update report date id to target report date id
            foreach($records as $rec) {
                $rec->report_date_id = $request->report_date_id_target;
            }

            // insert into the table
            SavingTransferee::insert($records->toArray());

            // send a flash message
            $request->session()->flash('alert-success', 'Save as operation was successful!');
        } else {
            // send a flash message
            $request->session()->flash('alert-danger', 'Save as operation failed! No records found.');
        }

        return redirect('saving-transferees');
    }
}
