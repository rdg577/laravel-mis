<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $trainer->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Date :') !!}
            {!! Form::select('report_date_id', $report_dates, $trainer->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $trainer->occupation->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('sector_id', $subsectors, $trainer->occupation->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('occupation_id', 'Occupation : ') !!}
            {!! Form::select('occupation_id', $occupations, $trainer->occupation->id,
                                                          ['class' => 'form-control',
                                                           'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('level', 'Level : ') !!}
            {!! Form::select('level', array('Level A' => 'Level A',
                                            'Level B' => 'Level B',
                                            'Level C' => 'Level C'),
                                      $trainer->level,
                                      ['class' => 'form-control', 'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">By Mode of Employment in the Institute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full-Time Male</td>
                        <td>Full-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'full_time_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'full_time_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Part-Time Male</td>
                        <td>Part-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'part_time_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'part_time_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">By Nationality</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ethiopian Male</td>
                        <td>Ethiopian Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'ethiopian_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'ethiopian_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Foreign Male</td>
                        <td>Foreign Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'non_ethiopian_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'non_ethiopian_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Core Trainers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'core_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'core_female', null, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Trainers that took TM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'took_tm_male', null, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'took_tm_female', null, ['class' => 'form-control']) !!}
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

        <div class="form-group">
            {!! Form::label('level', 'Level : ') !!}
            {!! Form::select('level', array('Level A' => 'Level A',
                                            'Level B' => 'Level B',
                                            'Level C' => 'Level C'),
                                      null,
                                      ['class' => 'form-control', 'id' => 'occupation']) !!}
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">By Mode of Employment in the Institute</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full-Time Male</td>
                        <td>Full-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'full_time_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'full_time_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Part-Time Male</td>
                        <td>Part-Time Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'part_time_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'part_time_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">By Nationality</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ethiopian Male</td>
                        <td>Ethiopian Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'ethiopian_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'ethiopian_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Foreign Male</td>
                        <td>Foreign Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'non_ethiopian_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'non_ethiopian_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Core Trainers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'core_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'core_female', 0, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="2">Trainers that took TM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <td>
                        {!! Form::input('number', 'took_tm_male', 0, ['class' => 'form-control']) !!}
                        </td>
                        <td>
                        {!! Form::input('number', 'took_tm_female', 0, ['class' => 'form-control']) !!}
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