<div class="col-lg-12 col-md-12 col-sm-12">

@if($submitButtonText=='Update')

    <input type="hidden" name="institution_id" value="{{ $saving_graduate->institution->id }}">

    <div class="form-group">
        {!! Form::label('report_date_id', 'Report Schedule :') !!}
        {!! Form::select('report_date_id', $report_dates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sector_id', 'Sector : ') !!}
        {!! Form::select('sector_id', $sectors, $saving_graduate->subsector->sector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-sub-sectors'),
                                                       'id' => 'sector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subsector_id', 'Sub-sector : ') !!}
        {!! Form::select('subsector_id', $subsectors, $saving_graduate->subsector->id,
                                                      ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id', $occupations, $saving_graduate->occupation->id,
                                                ['class' => 'form-control',
                                                'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default regular_savings">
        <div class="panel-heading">Regular Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'regular_level1_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'regular_level1_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_saving', 'Level 1 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level1_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'regular_level2_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'regular_level2_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_saving', 'Level 2 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level2_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'regular_level3_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'regular_level3_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_saving', 'Level 3 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level3_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'regular_level4_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'regular_level4_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_saving', 'Level 4 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level4_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'regular_level5_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'regular_level5_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_saving', 'Level 5 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level5_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="panel panel-default extension_savings">
        <div class="panel-heading">Extension Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'extension_level1_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'extension_level1_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_saving', 'Level 1 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level1_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'extension_level2_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'extension_level2_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_saving', 'Level 2 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level2_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'extension_level3_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'extension_level3_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_saving', 'Level 3 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level3_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'extension_level4_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'extension_level4_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_saving', 'Level 4 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level4_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'extension_level5_male', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'extension_level5_female', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_saving', 'Level 5 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level5_saving', null, ['class' => 'form-control', 'step' => '0.01']) !!}
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
        {!! Form::select('subsector_id', array('- select sector first -'), null, ['class' => 'form-control',
                                                       'data-url' => url('load-occupations'),
                                                       'id' => 'subsector']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('occupation_id', 'Occupation : ') !!}
        {!! Form::select('occupation_id',array('- select sector first -'), null,
                                                    ['class' => 'form-control',
                                                    'id' => 'occupation']) !!}
    </div>

    <div class="panel panel-default regular_savings">
        <div class="panel-heading">Regular Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'regular_level1_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'regular_level1_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level1_saving', 'Level 1 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level1_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'regular_level2_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'regular_level2_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level2_saving', 'Level 2 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level2_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'regular_level3_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'regular_level3_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level3_saving', 'Level 3 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level3_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'regular_level4_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'regular_level4_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level4_saving', 'Level 4 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level4_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'regular_level5_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'regular_level5_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('regular_level5_saving', 'Level 5 - Saving : ') !!}
                        {!! Form::input('number', 'regular_level5_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="panel panel-default extension_savings">
        <div class="panel-heading">Extension Trainees</div>
        <div class="panel-body">
            <div class="row level1">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_male', 'Level 1 - Male : ') !!}
                        {!! Form::input('number', 'extension_level1_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_female', 'Level 1 - Female : ') !!}
                        {!! Form::input('number', 'extension_level1_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level1_saving', 'Level 1 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level1_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level2">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_male', 'Level 2 - Male : ') !!}
                        {!! Form::input('number', 'extension_level2_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_female', 'Level 2 - Female : ') !!}
                        {!! Form::input('number', 'extension_level2_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level2_saving', 'Level 2 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level2_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level3">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_male', 'Level 3 - Male : ') !!}
                        {!! Form::input('number', 'extension_level3_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_female', 'Level 3 - Female : ') !!}
                        {!! Form::input('number', 'extension_level3_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level3_saving', 'Level 3 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level3_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level4">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_male', 'Level 4 - Male : ') !!}
                        {!! Form::input('number', 'extension_level4_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_female', 'Level 4 - Female : ') !!}
                        {!! Form::input('number', 'extension_level4_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level4_saving', 'Level 4 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level4_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
                    </div>
                </div>
            </div>

            <div class="row level5">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_male', 'Level 5 - Male : ') !!}
                        {!! Form::input('number', 'extension_level5_male', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_female', 'Level 5 - Female : ') !!}
                        {!! Form::input('number', 'extension_level5_female', 0, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        {!! Form::label('extension_level5_saving', 'Level 5 - Saving : ') !!}
                        {!! Form::input('number', 'extension_level5_saving', 0, ['class' => 'form-control', 'step' => '0.01']) !!}
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