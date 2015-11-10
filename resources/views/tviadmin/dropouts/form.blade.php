<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $dropout->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $dropout->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $dropout->occupation->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('department', 'Sub-sector : ') !!}
            {!! Form::select('department', $subsectors, $dropout->occupation->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', $occupations, $dropout->occupation->id,
                                                          ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('completed_level', 'Highest Completed Level before Dropout :') !!}
            {!! Form::select('completed_level', array('Level 1' => 'Level 1',
                                                      'Level 2' => 'Level 2',
                                                      'Level 3' => 'Level 3',
                                                      'Level 4' => 'Level 4',
                                                      'Level 5' => 'Level 5'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('completed_level', 'Number of Dropout Trainees :') !!}
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Regular Male</td>
                        <td>Regular Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'regular_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'regular_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Extension Male</td>
                        <td>Extension Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'extension_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'extension_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Short-Time Male</td>
                        <td>Short-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'short_term_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'short_term_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

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
            {!! Form::label('department', 'Sub-sector : ') !!}
            {!! Form::select('department', array('- select sector first -'), null, ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', array('- select sub-sector first -'), null,
                                                            ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('completed_level', 'Highest Completed Level before Dropout :') !!}
            {!! Form::select('completed_level', array('Level 1' => 'Level 1',
                                                      'Level 2' => 'Level 2',
                                                      'Level 3' => 'Level 3',
                                                      'Level 4' => 'Level 4',
                                                      'Level 5' => 'Level 5'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('completed_level', 'Number of Dropout Trainees :') !!}
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Regular Male</td>
                        <td>Regular Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'regular_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'regular_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Extension Male</td>
                        <td>Extension Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'extension_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'extension_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Short-Time Male</td>
                        <td>Short-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'short_term_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'short_term_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

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