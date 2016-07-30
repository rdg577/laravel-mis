<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $short_term_trainee->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, $short_term_trainee->occupation->subsector->sector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-sub-sectors'),
                                                       'id' => 'sector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        {!! Form::select('sector_id', $subsectors, $short_term_trainee->occupation->subsector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id', $occupations, $short_term_trainee->occupation->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-competencies'),
                                                       'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default registered">
        <div class="panel-heading">Registered</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('registered_male', 'Male : ') !!}
                        {!! Form::input('number', 'registered_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('registered_female', 'Female : ') !!}
                        {!! Form::input('number', 'registered_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default started_training">
        <div class="panel-heading">Started Training</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('started_training_male', 'Male : ') !!}
                        {!! Form::input('number', 'started_training_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('started_training_female', 'Female : ') !!}
                        {!! Form::input('number', 'started_training_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default completed_training">
        <div class="panel-heading">Completed Training</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('completed_training_male', 'Male : ') !!}
                        {!! Form::input('number', 'completed_training_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('completed_training_female', 'Female : ') !!}
                        {!! Form::input('number', 'completed_training_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sent_to_assessment">
        <div class="panel-heading">Sent To Assessment</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('sent_assessment_male', 'Male : ') !!}
                        {!! Form::input('number', 'sent_assessment_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('sent_assessment_female', 'Female : ') !!}
                        {!! Form::input('number', 'sent_assessment_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default assessed">
        <div class="panel-heading">Assessed</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('assessed_male', 'Male : ') !!}
                        {!! Form::input('number', 'assessed_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('assessed_female', 'Female : ') !!}
                        {!! Form::input('number', 'assessed_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default competent">
        <div class="panel-heading">Competent</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('competent_male', 'Male : ') !!}
                        {!! Form::input('number', 'competent_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('competent_female', 'Female : ') !!}
                        {!! Form::input('number', 'competent_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@elseif($submitButtonText=='Save')

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control',
                                                       'data-url' => url('load-sub-sectors'),
                                                       'id' => 'sector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        {!! Form::select('sector_id', array('- select sector first -'), null, ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id', array('- select sub-sector first -'), null, ['class' => 'form-control',
                                                       'data-url' => url('load-competencies'),
                                                       'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default registered">
        <div class="panel-heading">Registered</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('registered_male', 'Male : ') !!}
                        {!! Form::input('number', 'registered_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('registered_female', 'Female : ') !!}
                        {!! Form::input('number', 'registered_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default started_training">
        <div class="panel-heading">Started Training</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('started_training_male', 'Male : ') !!}
                        {!! Form::input('number', 'started_training_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('started_training_female', 'Female : ') !!}
                        {!! Form::input('number', 'started_training_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default completed_training">
        <div class="panel-heading">Completed Training</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('completed_training_male', 'Male : ') !!}
                        {!! Form::input('number', 'completed_training_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('completed_training_female', 'Female : ') !!}
                        {!! Form::input('number', 'completed_training_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default sent_to_assessment">
        <div class="panel-heading">Sent To Assessment</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('sent_assessment_male', 'Male : ') !!}
                        {!! Form::input('number', 'sent_assessment_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('sent_assessment_female', 'Female : ') !!}
                        {!! Form::input('number', 'sent_assessment_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default assessed">
        <div class="panel-heading">Assessed</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('assessed_male', 'Male : ') !!}
                        {!! Form::input('number', 'assessed_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('assessed_female', 'Female : ') !!}
                        {!! Form::input('number', 'assessed_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default competent">
        <div class="panel-heading">Competent</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('competent_male', 'Male : ') !!}
                        {!! Form::input('number', 'competent_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('competent_female', 'Female : ') !!}
                        {!! Form::input('number', 'competent_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>