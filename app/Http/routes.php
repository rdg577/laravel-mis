<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    if(Auth::check()) {

        $user = Auth::user();
        $page = 'sysadmin';

        if($user->user_type == 'System Administrator')
            $page = 'sysadmin';
        elseif($user->user_type == 'TVI Administrator')
            $page = 'tviadmin';
        elseif($user->user_type == 'Region Administrator')
            $page = 'rtaadmin';
        elseif($user->user_type == 'Cluster Administrator')
            $page = 'cluster_admin';

        return view('about', compact('page'));

    }

    return redirect('/auth/login');

});

Route::get('home', function () {
    if(Auth::check()) {
        $user = Auth::user();
        $page = 'sysadmin';
        if($user->user_type == 'System Administrator')
            $page = 'sysadmin';
        elseif($user->user_type == 'TVI Administrator')
            $page = 'tviadmin';
        elseif($user->user_type == 'Region Administrator')
            $page = 'rtaadmin';
        elseif($user->user_type == 'Cluster Administrator')
            $page = 'cluster_admin';

        return view('home', compact('user', 'page'));
    } else {
        return redirect('auth/login');
    }
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('users/register', ['middleware' => 'auth', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('users/register', ['middleware' => 'auth', 'uses' => 'Auth\AuthController@postRegister']);

// Change User Password
Route::get('change-password', ['middleware' => 'auth', 'uses' => 'UserController@showChangePasswordForm']);
Route::post('change-password', ['middleware' => 'auth', 'uses' => 'UserController@changePassword']);

Route::filter('admin', function () {
    if (!Auth::check() || !Auth::user()->isSystemAdmin()) {
        /*return App::abort(404);*/
        return redirect('/auth/login');
    }
});

Route::filter('rta', function () {
    if (!Auth::check() || !Auth::user()->isRTAAdmin()) {
        /*return App::abort(404);*/
        return redirect('/auth/login');
    }
});

Route::filter('tvi', function () {
    if (!Auth::check() || !Auth::user()->isTVIAdmin()) {
        /*return App::abort(404);*/
        return redirect('/auth/login');
    }
});

Route::group(array('middleware' => 'auth'), function () {
    Route::get('load-sub-sectors', function(){
        $input = Input::get('option');
        $sector = \App\Sector::find($input);
        $subsectors = $sector->subsectors()->where('active', true)->orderBy('name', 'asc');
        return Response::make($subsectors->get(['id','name']));
    });

    Route::get('load-occupations', function(){
        $input = Input::get('option');
        $subsector = \App\Subsector::find($input);
        $occupations = $subsector->occupations()->where('active', true)->orderBy('name', 'asc');
        return Response::make($occupations->get(['id','name']));
    });

    Route::get('load-competencies', function(){
        $input = Input::get('option');
        $occupation = \App\Occupation::find($input);
        $competencies = $occupation->competencies()->where('active', true)->orderBy('name', 'asc');
        return Response::make($competencies->get(['id', 'name']));
    });

    Route::get('load-proposal-title-fields', function() {
        $input = Input::get('value');

        return $input;
    });

    Route::get('load-completed-title-fields', function() {
        $input = Input::get('value');

        return $input;
    });

});

// RTA Admin routes...
Route::group(array('before' => 'rta', 'middleware' => 'auth'), function () {
    // Institutions
    Route::get('rta-institutions', 'RTA\RTAController@institutions');
    Route::get('rta-institutions/{id}', 'RTA\RTAController@school_profile');

    // Report Dates routes...
    Route::get('create-report-date', 'TVI\ReportDateController@create');
    Route::post('create-report-date', 'TVI\ReportDateController@store');
    Route::get('report-dates', 'TVI\ReportDateController@index');
    Route::get('report-dates/{id}/edit', 'TVI\ReportDateController@edit');
    Route::patch('report-dates/{id}', 'TVI\ReportDateController@update');
    Route::get('report-dates/{id}/delete', 'TVI\ReportDateController@delete');
    Route::delete('report-dates/{id}', 'TVI\ReportDateController@destroy');
    Route::get('report-dates/{id}', 'TVI\ReportDateController@show');

    // Indicators
    Route::get('rta-indicators', 'RTA\RTAController@indicators');
    Route::post('rta-indicators', 'RTA\RTAController@show_indicators');

    // Data Summary
    /*Route::get('rta-data-summary', 'RTA\RTAController@data_summary');
    Route::post('rta-data-summary', 'RTA\RTAController@show_data_summary');*/

    // Report 1 - Government
    Route::get('report-1/government', 'RTA\Report1GovController@report1_government');
    Route::post('report-1/government', 'RTA\Report1GovController@show_report1_government');
    Route::get('report-1/gov-new-enrollees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_new');
    Route::get('report-1/gov-re-enrollees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_re');
    Route::get('report-1/gov-transferees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_trans');
    Route::get('report-1/gov-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_grad');
    Route::get('report-1/gov-short-term-trainees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_short');
    Route::get('report-1/gov-dropout-transferees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_drop_trans');
    Route::get('report-1/gov-dropout-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_drop_grad');
    Route::get('report-1/gov-dropout-short-term-trainees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_drop_short');
    Route::get('report-1/gov-assessment-transferees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_ass_trans');
    Route::get('report-1/gov-assessment-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_ass_grad');
    Route::get('report-1/gov-assessment-short-term-trainees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_ass_short');
    Route::get('report-1/gov-cooperative-training-with-industry-partners/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_coop_trng_industry_partner');
    Route::get('report-1/gov-cooperative-training-transferees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_coop_trng_trans');
    Route::get('report-1/gov-cooperative-training-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_coop_trng_grad');
    Route::get('report-1/gov-cooperative-training-short-term-trainees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_coop_trng_short');
    Route::get('report-1/gov-saving-transferees/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_saving_trans');
    Route::get('report-1/gov-saving-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_saving_grad');
    Route::get('report-1/gov-job-placement-graduates/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_job_placement_grad');
    Route::get('report-1/gov-action-research/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_action_research');
    Route::get('report-1/gov-tracer-study/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_tracer_study');
    Route::get('report-1/gov-trainers/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_trainer');
    Route::get('report-1/gov-industry-extension-1/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_industry_extension_1');
    Route::get('report-1/gov-industry-extension-2/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_industry_extension_2');
    Route::get('report-1/gov-industry-extension-3/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_industry_extension_3');
    Route::get('report-1/gov-industry-extension-4/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_industry_extension_4');
    Route::get('report-1/gov-industry-extension-5/print/{id}', 'RTA\Report1GovController@for_print_rpt1_gov_industry_extension_5');



    // Report 1 - Non-Government
    Route::get('report-1/non-government', 'RTA\Report1NonGovController@report1_non_government');
    Route::post('report-1/non-government', 'RTA\Report1NonGovController@show_report1_non_government');
    Route::get('report-1/non-gov-new-enrollees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_new');
    Route::get('report-1/non-gov-re-enrollees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_re');
    Route::get('report-1/non-gov-transferees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_trans');
    Route::get('report-1/non-gov-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_grad');
    Route::get('report-1/non-gov-short-term-trainees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_short');
    Route::get('report-1/non-gov-dropout-transferees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_drop_trans');
    Route::get('report-1/non-gov-dropout-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_drop_grad');
    Route::get('report-1/non-gov-dropout-short-term-trainees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_drop_short');
    Route::get('report-1/non-gov-assessment-transferees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_ass_trans');
    Route::get('report-1/non-gov-assessment-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_ass_grad');
    Route::get('report-1/non-gov-assessment-short-term-trainees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_ass_short');
    Route::get('report-1/non-gov-cooperative-training-with-industry-partners/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_coop_trng_industry_partner');
    Route::get('report-1/non-gov-cooperative-training-transferees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_coop_trng_trans');
    Route::get('report-1/non-gov-cooperative-training-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_coop_trng_grad');
    Route::get('report-1/non-gov-cooperative-training-short-term-trainees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_coop_trng_short');
    Route::get('report-1/non-gov-saving-transferees/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_saving_trans');
    Route::get('report-1/non-gov-saving-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_saving_grad');
    Route::get('report-1/non-gov-job-placement-graduates/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_job_placement_grad');
    Route::get('report-1/non-gov-action-research/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_action_research');
    Route::get('report-1/non-gov-tracer-study/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_tracer_study');
    Route::get('report-1/non-gov-trainers/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_trainer');
    Route::get('report-1/non-gov-industry-extension-1/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_industry_extension_1');
    Route::get('report-1/non-gov-industry-extension-2/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_industry_extension_2');
    Route::get('report-1/non-gov-industry-extension-3/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_industry_extension_3');
    Route::get('report-1/non-gov-industry-extension-4/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_industry_extension_4');
    Route::get('report-1/non-gov-industry-extension-5/print/{id}', 'RTA\Report1NonGovController@for_print_rpt1_nongov_industry_extension_5');

    // Report 2 - Government
    Route::get('report-2/government', 'RTA\Report2GovController@report2_government');
    Route::post('report-2/government', 'RTA\Report2GovController@show_report2_government');
    Route::get('report-2/gov-new-enrollees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_new');
    Route::get('report-2/gov-re-enrollees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_re');
    Route::get('report-2/gov-transferees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_trans');
    Route::get('report-2/gov-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_grad');
    Route::get('report-2/gov-short-term-trainees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_short');
    Route::get('report-2/gov-dropout-transferees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_drop_trans');
    Route::get('report-2/gov-dropout-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_drop_grad');
    Route::get('report-2/gov-dropout-short-term-trainees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_drop_short');
    Route::get('report-2/gov-assessment-transferees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_ass_trans');
    Route::get('report-2/gov-assessment-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_ass_grad');
    Route::get('report-2/gov-assessment-short-term-trainees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_ass_short');
    Route::get('report-2/gov-cooperative-training-transferees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_coop_trng_trans');
    Route::get('report-2/gov-cooperative-training-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_coop_trng_grad');
    Route::get('report-2/gov-cooperative-training-short-term-trainees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_coop_trng_short');
    Route::get('report-2/gov-saving-transferees/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_saving_trans');
    Route::get('report-2/gov-saving-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_saving_grad');
    Route::get('report-2/gov-job-placement-graduates/print/{id}', 'RTA\Report2GovController@for_print_rpt2_gov_job_placement_grad');

    // Report 2 - Non-Government
    Route::get('report-2/non-government', 'RTA\Report2NonGovController@report2_non_government');
    Route::post('report-2/non-government', 'RTA\Report2NonGovController@show_report2_non_government');
    Route::get('report-2/non-gov-new-enrollees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_new');
    Route::get('report-2/non-gov-re-enrollees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_re');
    Route::get('report-2/non-gov-transferees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_trans');
    Route::get('report-2/non-gov-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_grad');
    Route::get('report-2/non-gov-short-term-trainees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_short');
    Route::get('report-2/non-gov-dropout-transferees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_drop_trans');
    Route::get('report-2/non-gov-dropout-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_drop_grad');
    Route::get('report-2/non-gov-dropout-short-term-trainees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_drop_short');
    Route::get('report-2/non-gov-assessment-transferees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_ass_trans');
    Route::get('report-2/non-gov-assessment-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_ass_grad');
    Route::get('report-2/non-gov-assessment-short-term-trainees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_ass_short');
    Route::get('report-2/non-gov-cooperative-training-transferees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_coop_trng_trans');
    Route::get('report-2/non-gov-cooperative-training-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_coop_trng_grad');
    Route::get('report-2/non-gov-cooperative-training-short-term-trainees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_coop_trng_short');
    Route::get('report-2/non-gov-saving-transferees/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_saving_trans');
    Route::get('report-2/non-gov-saving-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_saving_grad');
    Route::get('report-2/non-gov-job-placement-graduates/print/{id}', 'RTA\Report2NonGovController@for_print_rpt2_gov_job_placement_grad');

    // Institutional Summary Report
    Route::get('rta-institutions/{id}/summary-report', 'RTA\RTAController@institutional_summary_report');
    Route::post('rta-institutions/{id}/summary-report', 'RTA\RTAController@institutional_summary_report2');
});

// TVI Admin routes...
Route::group(array('before' => 'tvi', 'middleware' => 'auth'), function () {
    // Profile routes...
    Route::get('tvi/{id}/profile', 'TVI\ProfileController@show');
    Route::get('tvi/{id}/profile-edit', 'TVI\ProfileController@edit');
    Route::patch('tvi/{id}/profile', 'TVI\ProfileController@update');

    // Formal Training routes...
    Route::resource('formal-trainings', 'TVI\FormalTrainingController');
    Route::get('formal-trainings/{id}/delete', 'TVI\FormalTrainingController@delete');
    Route::get('formal-trainings/{id}/save-as', 'TVI\FormalTrainingController@saveAsForm');
    Route::post('formal-trainings/save-as', 'TVI\FormalTrainingController@saveAs');

    // Short-Term Training routes...
    Route::resource('short-term-trainings', 'TVI\ShortTermTrainingController');
    Route::get('short-term-trainings/{id}/delete', 'TVI\ShortTermTrainingController@delete');
    Route::get('short-term-trainings/{id}/save-as', 'TVI\ShortTermTrainingController@saveAsForm');
    Route::post('short-term-trainings/save-as', 'TVI\ShortTermTrainingController@saveAs');

    // Assessment Training routes...
    Route::resource('assessments', 'TVI\AssessmentController');
    Route::get('assessments/{id}/delete', 'TVI\AssessmentController@delete');
    Route::get('assessments/{id}/save-as', 'TVI\AssessmentController@saveAsForm');
    Route::post('assessments/save-as', 'TVI\AssessmentController@saveAs');

    // Cooperative Training routes...
    Route::resource('cooperative-trainings', 'TVI\CooperativeTrainingController');
    Route::get('cooperative-trainings/{id}/delete', 'TVI\CooperativeTrainingController@delete');
    Route::get('cooperative-trainings/{id}/save-as', 'TVI\CooperativeTrainingController@saveAsForm');
    Route::post('cooperative-trainings/save-as', 'TVI\CooperativeTrainingController@saveAs');

    // Trainer routes...
    Route::resource('trainers', 'TVI\TrainerController');
    Route::get('trainers/{id}/delete', 'TVI\TrainerController@delete');
    Route::get('trainers/{id}/save-as', 'TVI\TrainerController@saveAsForm');
    Route::post('trainers/save-as', 'TVI\TrainerController@saveAs');

    // Dropout routes...
    Route::resource('dropouts', 'TVI\DropoutController');
    Route::get('dropouts/{id}/delete', 'TVI\DropoutController@delete');
    Route::get('dropouts/{id}/save-as', 'TVI\DropoutController@saveAsForm');
    Route::post('dropouts/save-as', 'TVI\DropoutController@saveAs');

    // IndustryExtension1 routes...
    Route::resource('industry-extension-1', 'TVI\IndustryExtension1Controller');
    Route::get('industry-extension-1/{id}/delete', 'TVI\IndustryExtension1Controller@delete');
    Route::get('industry-extension-1/{id}/save-as', 'TVI\IndustryExtension1Controller@saveAsForm');
    Route::post('industry-extension-1/save-as', 'TVI\IndustryExtension1Controller@saveAs');

    // IndustryExtension2 routes...
    Route::resource('industry-extension-2', 'TVI\IndustryExtension2Controller');
    Route::get('industry-extension-2/{id}/delete', 'TVI\IndustryExtension2Controller@delete');
    Route::get('industry-extension-2/{id}/save-as', 'TVI\IndustryExtension2Controller@saveAsForm');
    Route::post('industry-extension-2/save-as', 'TVI\IndustryExtension2Controller@saveAs');

    // IndustryExtension3 routes...
    Route::resource('industry-extension-3', 'TVI\IndustryExtension3Controller');
    Route::get('industry-extension-3/{id}/delete', 'TVI\IndustryExtension3Controller@delete');
    Route::get('industry-extension-3/{id}/save-as', 'TVI\IndustryExtension3Controller@saveAsForm');
    Route::post('industry-extension-3/save-as', 'TVI\IndustryExtension3Controller@saveAs');

    // IndustryExtension4 routes...
    Route::resource('industry-extension-4', 'TVI\IndustryExtension4Controller');
    Route::get('industry-extension-4/{id}/delete', 'TVI\IndustryExtension4Controller@delete');
    Route::get('industry-extension-4/{id}/save-as', 'TVI\IndustryExtension4Controller@saveAsForm');
    Route::post('industry-extension-4/save-as', 'TVI\IndustryExtension4Controller@saveAs');

    // IndustryExtension5 routes...
    Route::resource('industry-extension-5', 'TVI\IndustryExtension5Controller');
    Route::get('industry-extension-5/{id}/delete', 'TVI\IndustryExtension5Controller@delete');
    Route::get('industry-extension-5/{id}/save-as', 'TVI\IndustryExtension5Controller@saveAsForm');
    Route::post('industry-extension-5/save-as', 'TVI\IndustryExtension5Controller@saveAs');

    // Report Data Summary
    Route::get('report-data-summary', 'TVI\ReportController@index');
    Route::post('report-data-summary', 'TVI\ReportController@show');

    Route::get('summary-report', 'TVI\ReportController@institutional_summary_report');
    Route::post('summary-report', 'TVI\ReportController@institutional_summary_report2');

    // Indicators
    Route::get('indicators', 'TVI\IndicatorsController@index');
    Route::post('indicators', 'TVI\IndicatorsController@show');

    // New Enrollee routes...
    Route::resource('trainees-new-enrollees', 'TVI\NewEnrolleeController');
    Route::get('trainees-new-enrollees/{id}/delete', 'TVI\NewEnrolleeController@delete');
    Route::get('trainees-new-enrollees/{id}/save-as', 'TVI\NewEnrolleeController@saveAsForm');
    Route::post('trainees-new-enrollees/save-as', 'TVI\NewEnrolleeController@saveAs');

    // Re-Enrollee routes...
    Route::resource('trainees-re-enrollees', 'TVI\ReEnrolleeController');
    Route::get('trainees-re-enrollees/{id}/delete', 'TVI\ReEnrolleeController@delete');
    Route::get('trainees-re-enrollees/{id}/save-as', 'TVI\ReEnrolleeController@saveAsForm');
    Route::post('trainees-re-enrollees/save-as', 'TVI\ReEnrolleeController@saveAs');

    // Graduate routes...
    Route::resource('trainees-graduates', 'TVI\GraduateController');
    Route::get('trainees-graduates/{id}/delete', 'TVI\GraduateController@delete');
    Route::get('trainees-graduates/{id}/save-as', 'TVI\GraduateController@saveAsForm');
    Route::post('trainees-graduates/save-as', 'TVI\GraduateController@saveAs');

    // Transferee routes...
    Route::resource('trainees-transferees', 'TVI\TransfereeController');
    Route::get('trainees-transferees/{id}/delete', 'TVI\TransfereeController@delete');
    Route::get('trainees-transferees/{id}/save-as', 'TVI\TransfereeController@saveAsForm');
    Route::post('trainees-transferees/save-as', 'TVI\TransfereeController@saveAs');

    // Short-Term Trainee routes...
    Route::resource('short-term-trainees', 'TVI\ShortTermTraineeController');
    Route::get('short-term-trainees/{id}/delete', 'TVI\ShortTermTraineeController@delete');
    Route::get('short-term-trainees/{id}/save-as', 'TVI\ShortTermTraineeController@saveAsForm');
    Route::post('short-term-trainees/save-as', 'TVI\ShortTermTraineeController@saveAs');

    // Dropout-graduates  routes...
    Route::resource('dropout-graduates', 'TVI\DropoutGraduatesController');
    Route::get('dropout-graduates/{id}/delete', 'TVI\DropoutGraduatesController@delete');
    Route::get('dropout-graduates/{id}/save-as', 'TVI\DropoutGraduatesController@saveAsForm');
    Route::post('dropout-graduates/save-as', 'TVI\DropoutGraduatesController@saveAs');

    // Dropout-from-transferees  routes...
    Route::resource('dropout-from-transferees', 'TVI\DropoutTransfereesController');
    Route::get('dropout-from-transferees/{id}/delete', 'TVI\DropoutTransfereesController@delete');
    Route::get('dropout-from-transferees/{id}/save-as', 'TVI\DropoutTransfereesController@saveAsForm');
    Route::post('dropout-from-transferees/save-as', 'TVI\DropoutTransfereesController@saveAs');

    // Dropout-from-short-term-trainees  routes...
    Route::resource('dropout-short-term', 'TVI\DropoutShortTermTraineesController');
    Route::get('dropout-short-term/{id}/delete', 'TVI\DropoutShortTermTraineesController@delete');
    Route::get('dropout-short-term/{id}/save-as', 'TVI\DropoutShortTermTraineesController@saveAsForm');
    Route::post('dropout-short-term/save-as', 'TVI\DropoutShortTermTraineesController@saveAs');

    // Assessment-transferees  routes...
    Route::resource('assessment-transferees', 'TVI\AssessmentTransfereesController');
    Route::get('assessment-transferees/{id}/delete', 'TVI\AssessmentTransfereesController@delete');
    Route::get('assessment-transferees/{id}/save-as', 'TVI\AssessmentTransfereesController@saveAsForm');
    Route::post('assessment-transferees/save-as', 'TVI\AssessmentTransfereesController@saveAs');

    // Assessment-graduates  routes...
    Route::resource('assessment-graduates', 'TVI\AssessmentGraduatesController');
    Route::get('assessment-graduates/{id}/delete', 'TVI\AssessmentGraduatesController@delete');
    Route::get('assessment-graduates/{id}/save-as', 'TVI\AssessmentGraduatesController@saveAsForm');
    Route::post('assessment-graduates/save-as', 'TVI\AssessmentGraduatesController@saveAs');

    // Assessment-short-term  routes...
    Route::resource('assessment-short-term', 'TVI\AssessmentShortTermTraineesController');
    Route::get('assessment-short-term/{id}/delete', 'TVI\AssessmentShortTermTraineesController@delete');
    Route::get('assessment-short-term/{id}/save-as', 'TVI\AssessmentShortTermTraineesController@saveAsForm');
    Route::post('assessment-short-term/save-as', 'TVI\AssessmentShortTermTraineesController@saveAs');

    // Cooperative-training-transferees  routes...
    Route::resource('cooperative-training-transferees', 'TVI\CooperativeTrainingTransfereeController');
    Route::get('cooperative-training-transferees/{id}/delete', 'TVI\CooperativeTrainingTransfereeController@delete');
    Route::get('cooperative-training-transferees/{id}/save-as', 'TVI\CooperativeTrainingTransfereeController@saveAsForm');
    Route::post('cooperative-training-transferees/save-as', 'TVI\CooperativeTrainingTransfereeController@saveAs');

    // CooperativeTraining-graduates  routes...
    Route::resource('cooperative-training-graduates', 'TVI\CooperativeTrainingGraduateController');
    Route::get('cooperative-training-graduates/{id}/delete', 'TVI\CooperativeTrainingGraduateController@delete');
    Route::get('cooperative-training-graduates/{id}/save-as', 'TVI\CooperativeTrainingGraduateController@saveAsForm');
    Route::post('cooperative-training-graduates/save-as', 'TVI\CooperativeTrainingGraduateController@saveAs');

    // CooperativeTraining-short-term  routes...
    Route::resource('cooperative-training-short-term', 'TVI\CooperativeTrainingShortTermTraineeController');
    Route::get('cooperative-training-short-term/{id}/delete', 'TVI\CooperativeTrainingShortTermTraineeController@delete');
    Route::get('cooperative-training-short-term/{id}/save-as', 'TVI\CooperativeTrainingShortTermTraineeController@saveAsForm');
    Route::post('cooperative-training-short-term/save-as', 'TVI\CooperativeTrainingShortTermTraineeController@saveAs');

    // Saving-transferees  routes...
    Route::resource('saving-transferees', 'TVI\SavingTransfereeController');
    Route::get('saving-transferees/{id}/delete', 'TVI\SavingTransfereeController@delete');
    Route::get('saving-transferees/{id}/save-as', 'TVI\SavingTransfereeController@saveAsForm');
    Route::post('saving-transferees/save-as', 'TVI\SavingTransfereeController@saveAs');

    // Saving-graduates  routes...
    Route::resource('saving-graduates', 'TVI\SavingGraduateController');
    Route::get('saving-graduates/{id}/delete', 'TVI\SavingGraduateController@delete');
    Route::get('saving-graduates/{id}/save-as', 'TVI\SavingGraduateController@saveAsForm');
    Route::post('saving-graduates/save-as', 'TVI\SavingGraduateController@saveAs');

    // Job-Placement-graduates  routes...
    Route::resource('job-placement-graduates', 'TVI\JobPlacementGraduateController');
    Route::get('job-placement-graduates/{id}/delete', 'TVI\JobPlacementGraduateController@delete');
    Route::get('job-placement-graduates/{id}/save-as', 'TVI\JobPlacementGraduateController@saveAsForm');
    Route::post('job-placement-graduates/save-as', 'TVI\JobPlacementGraduateController@saveAs');

    // Action-Research  routes...
    Route::resource('action-research', 'TVI\ActionResearchController');
    Route::get('action-research/{id}/delete', 'TVI\ActionResearchController@delete');
    Route::get('action-research/{id}/save-as', 'TVI\ActionResearchController@saveAsForm');
    Route::post('action-research/save-as', 'TVI\ActionResearchController@saveAs');
    Route::get('action-research-titles/{id}', 'TVI\ActionResearchController@addTitles');
    Route::post('action-research-titles/{id}', 'TVI\ActionResearchController@saveTitles');
    Route::get('action-research-titles/{id}/delete', 'TVI\ActionResearchController@deleteTitles');

    // Tracer-Study  routes...
    Route::resource('tracer-studies', 'TVI\TracerStudyController');
    Route::get('tracer-studies/{id}/delete', 'TVI\TracerStudyController@delete');
    Route::get('tracer-studies/{id}/save-as', 'TVI\TracerStudyController@saveAsForm');
    Route::post('tracer-studies/save-as', 'TVI\TracerStudyController@saveAs');

});

// System Admin routes...
Route::group(array('before' => 'admin', 'middleware' => 'auth'), function() {

    // Users routes...
    Route::resource('users', 'UserController');
    /*Route:get('users/{id}/delete', 'UserController@delete');*/

    // Institution routes...
    Route::resource('institutions', 'InstitutionController');
    /*Route::get('institutions/{id}/delete', 'InstitutionController@delete');*/

    // Sector routes...
    Route::resource('sectors', 'SectorController');
    /*Route::get('sectors/{id}/delete', 'SectorController@delete');*/

    // Subsector routes...
    Route::resource('subsectors', 'SubsectorController');
    /*Route::get('subsectors/{id}/delete', 'SubsectorController@delete');*/

    // Occupation routes...
    Route::resource('occupations', 'OccupationController');
    /*Route::get('occupations/{id}/delete', 'OccupationController@delete');*/

    // Competency routes...
    Route::resource('competencies', 'CompetencyController');
    /*Route::get('competencies/{id}/delete', 'CompetencyController@delete');*/

});
