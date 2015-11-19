<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $industry_extension4->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $industry_extension4->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $industry_extension4->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $industry_extension4->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Number of trainees who completed the training</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="form-group">
                            {!! Form::label('short_term_male', 'Short Term Training - MALE : ') !!}
                            {!! Form::input('number', 'short_term_male', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('short_term_female', 'Short Term Training - FEMALE : ') !!}
                            {!! Form::input('number', 'short_term_female', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level1n2_male', 'Level 1 and 2 - MALE : ') !!}
                            {!! Form::input('number', 'level1n2_male', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level1n2_female', 'Level 1 and 2 - FEMALE : ') !!}
                            {!! Form::input('number', 'level1n2_female', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level3n4_male', 'Level 3 and 4 - MALE : ') !!}
                            {!! Form::input('number', 'level3n4_male', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level3n4_female', 'Level 3 and 4 - FEMALE : ') !!}
                            {!! Form::input('number', 'level3n4_female', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>  {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div>{{-- div class="panel panel-default"--}}

        <div class="panel panel-default">
            <div class="panel-heading">Establish firm and started work</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            {!! Form::label('operator_male', 'Operators - MALE : ') !!}
                            {!! Form::input('number', 'operator_male', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('operator_female', 'Operators - FEMALE : ') !!}
                            {!! Form::input('number', 'operator_female', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mse', 'MSE : ') !!}
                            {!! Form::input('number', 'mse', null, ['class' => 'form-control']) !!}
                        </div>
                    </div> {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div> {{--div class="panel panel-default"--}}

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $report_date_id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', array('- select sector first -'), null, ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Number of trainees who completed the training</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="form-group">
                            {!! Form::label('short_term_male', 'Short Term Training - MALE : ') !!}
                            {!! Form::input('number', 'short_term_male', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('short_term_female', 'Short Term Training - FEMALE : ') !!}
                            {!! Form::input('number', 'short_term_female', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level1n2_male', 'Level 1 and 2 - MALE : ') !!}
                            {!! Form::input('number', 'level1n2_male', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level1n2_female', 'Level 1 and 2 - FEMALE : ') !!}
                            {!! Form::input('number', 'level1n2_female', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level3n4_male', 'Level 3 and 4 - MALE : ') !!}
                            {!! Form::input('number', 'level3n4_male', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('level3n4_female', 'Level 3 and 4 - FEMALE : ') !!}
                            {!! Form::input('number', 'level3n4_female', 0, ['class' => 'form-control']) !!}
                        </div>
                    </div>  {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div>{{-- div class="panel panel-default"--}}

        <div class="panel panel-default">
            <div class="panel-heading">Establish firm and started work</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            {!! Form::label('operator_male', 'Operators - MALE : ') !!}
                            {!! Form::input('number', 'operator_male', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('operator_female', 'Operators - FEMALE : ') !!}
                            {!! Form::input('number', 'operator_female', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mse', 'MSE : ') !!}
                            {!! Form::input('number', 'mse', 0, ['class' => 'form-control']) !!}
                        </div>
                    </div> {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div> {{--div class="panel panel-default"--}}

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="create-form"--}}

@endif

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
        {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
    </div>
</div>