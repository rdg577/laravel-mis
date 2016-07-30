<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $industry_extension5->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
            {!! Form::select('report_date_id', $report_dates, $industry_extension5->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $industry_extension5->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $industry_extension5->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ie_field', 'Supported fields of IE : ') !!}
            {!! Form::select('ie_field', array('Kaizen' => 'Kaizen',
                                                'Entrepreneurship' => 'Entrepreneurship',
                                                'Technical Skill' => 'Technical Skill',
                                                'Technology Transfer' => 'Technology Transfer'),
                                         $industry_extension5->ie_field,
                                         ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

                        <div class="form-group">
                            {!! Form::label('micro', 'Micro : ') !!}
                            {!! Form::input('number', 'micro', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('small', 'Small : ') !!}
                            {!! Form::input('number', 'small', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('medium', 'Medium : ') !!}
                            {!! Form::input('number', 'medium', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>  {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div>{{-- div class="panel panel-default"--}}

        <div class="panel panel-default">
            <div class="panel-heading">Number of trainers capacitated</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level C</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_c_male', null, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_c_female', null, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level B</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_b_male', null, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_b_female', null, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level A</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_a_male', null, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_a_female', null, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>
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
            {!! Form::label('report_date_idReport ScheduleDate :') !!}
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

        <div class="form-group">
            {!! Form::label('ie_field', 'Supported fields of IE : ') !!}
            {!! Form::select('ie_field', array('Kaizen' => 'Kaizen',
                                                'Entrepreneurship' => 'Entrepreneurship',
                                                'Technical Skill' => 'Technical Skill',
                                                'Technology Transfer' => 'Technology Transfer'),
                                         null, ['class' => 'form-control', 'id' => 'subsector']) !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Number of companies supported in Industry Extension by the TVET Institute (by type of company)</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

                        <div class="form-group">
                            {!! Form::label('micro', 'Micro : ') !!}
                            {!! Form::input('number', 'micro', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('small', 'Small : ') !!}
                            {!! Form::input('number', 'small', 0, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('medium', 'Medium : ') !!}
                            {!! Form::input('number', 'medium', 0, ['class' => 'form-control']) !!}
                        </div>

                    </div>  {{--div class="col-md-10 col-md-offset-1"--}}
                </div> {{--div class="row"--}}
            </div> {{--div class="panel-body"--}}
        </div>{{-- div class="panel panel-default"--}}

        <div class="panel panel-default">
            <div class="panel-heading">Number of trainers capacitated</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level C</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_c_male', 0, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_c_female', 0, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level B</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_b_male', 0, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_b_female', 0, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Level A</th>
                                </tr>
                                <tr>
                                    <th>Male</th><th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! Form::input('number', 'level_a_male', 0, ['class' => 'form-control']) !!}</td>
                                    <td>{!! Form::input('number', 'level_a_female', 0, ['class' => 'form-control']) !!}</td>
                                </tr>
                            </tbody>
                        </table>
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