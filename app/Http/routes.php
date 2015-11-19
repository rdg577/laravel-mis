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

Route::get('home', function () {
    if(Auth::check()) {
        $user = Auth::user();
        return view('home', compact('user'));
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



Route::filter('admin', function () {
    if (!Auth::check() || !Auth::user()->isSystemAdmin()) {
        return App::abort(404);
    }
});

Route::filter('tvi', function () {
    if (!Auth::check() || !Auth::user()->isTVIAdmin()) {
        return App::abort(404);
    }
});

Route::group(array('middleware' => 'auth'), function () {
    Route::get('load-sub-sectors', function(){
        $input = Input::get('option');
        $sector = \App\Sector::find($input);
        $subsectors = $sector->subsectors();
        return Response::make($subsectors->get(['id','name']));
    });

    Route::get('load-occupations', function(){
        $input = Input::get('option');
        $subsector = \App\Subsector::find($input);
        $occupations = $subsector->occupations();
        return Response::make($occupations->get(['id','name']));
    });

    Route::get('load-competencies', function(){
        $input = Input::get('option');
        $occupation = \App\Occupation::find($input);
        $competencies = $occupation->competencies();
        return Response::make($competencies->get(['id', 'name']));
    });
});

// TVI Admin routes...
Route::group(array('before' => 'tvi', 'middleware' => 'auth'), function () {
    // Profile routes...
    Route::get('tvi/{id}/profile', 'TVI\ProfileController@show');
    Route::get('tvi/{id}/profile-edit', 'TVI\ProfileController@edit');
    Route::patch('tvi/{id}/profile', 'TVI\ProfileController@update');

    // Report Dates routes...
    Route::get('create-report-date', 'TVI\ReportDateController@create');
    Route::post('create-report-date', 'TVI\ReportDateController@store');
    Route::get('report-dates', 'TVI\ReportDateController@index');
    Route::get('report-dates/{id}/edit', 'TVI\ReportDateController@edit');
    Route::patch('report-dates/{id}', 'TVI\ReportDateController@update');
    Route::get('report-dates/{id}/delete', 'TVI\ReportDateController@delete');
    Route::delete('report-dates/{id}', 'TVI\ReportDateController@destroy');

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

    // Short-Term Training routes...
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
});

// System Admin routes...
Route::group(array('before' => 'admin', 'middleware' => 'auth'), function() {

    // Users routes...
    Route::resource('users', 'UserController');
    Route:get('users/{id}/delete', 'UserController@delete');

    // Institution routes...
    Route::resource('institutions', 'InstitutionController');
    Route::get('institutions/{id}/delete', 'InstitutionController@delete');

    // Sector routes...
    Route::resource('sectors', 'SectorController');
    Route::get('sectors/{id}/delete', 'SectorController@delete');

    // Subsector routes...
    Route::resource('subsectors', 'SubsectorController');
    Route::get('subsectors/{id}/delete', 'SubsectorController@delete');

    // Occupation routes...
    Route::resource('occupations', 'OccupationController');
    Route::get('occupations/{id}/delete', 'OccupationController@delete');

    // Competency routes...
    Route::resource('competencies', 'CompetencyController');
    Route::get('competencies/{id}/delete', 'CompetencyController@delete');

});
