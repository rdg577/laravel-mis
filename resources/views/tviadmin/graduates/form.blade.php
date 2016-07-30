<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $graduate->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, $graduate->occupation->subsector->sector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-sub-sectors'),
                                                       'id' => 'sector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        {!! Form::select('sector_id', $subsectors, $graduate->occupation->subsector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id', $occupations, $graduate->occupation->id,
                                                      ['class' => 'form-control',
                                                       'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default regular_trainees">
        <div class="panel-heading">Regular Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'regular_level1_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'regular_level1_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'regular_level2_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'regular_level2_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'regular_level3_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'regular_level3_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'regular_level4_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'regular_level4_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'regular_level5_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'regular_level5_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="panel panel-default extension_trainees">
        <div class="panel-heading">Extension Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'extension_level1_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'extension_level1_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'extension_level2_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'extension_level2_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'extension_level3_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'extension_level3_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'extension_level4_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'extension_level4_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'extension_level5_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'extension_level5_female', null, ['class' => 'form-control']) !!}
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
                                                       'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default regular_trainees">
        <div class="panel-heading">Regular Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'regular_level1_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'regular_level1_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'regular_level2_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'regular_level2_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'regular_level3_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'regular_level3_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'regular_level4_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'regular_level4_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'regular_level5_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('regular_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'regular_level5_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="panel panel-default extension_trainees">
        <div class="panel-heading">Extension Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'extension_level1_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'extension_level1_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'extension_level2_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'extension_level2_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'extension_level3_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'extension_level3_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'extension_level4_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'extension_level4_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'extension_level5_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        {!! Form::label('extension_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'extension_level5_female', 0, ['class' => 'form-control']) !!}
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