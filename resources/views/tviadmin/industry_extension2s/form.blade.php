<div class="col-md-8 col-md-offset-2">

@if($submitButtonText=='Update')

    <div class="update-form">

        <input type="hidden" name="institution_id" value="{{ $industry_extension2->institution->id }}">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
            {!! Form::select('report_date_id', $report_dates, $industry_extension2->report_date->id, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sector_id', 'Sector : ') !!}
            {!! Form::select('sector_id', $sectors, $industry_extension2->subsector->sector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-sub-sectors'),
                                                           'id' => 'sector']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subsector_id', 'Sub-sector : ') !!}
            {!! Form::select('subsector_id', $subsectors, $industry_extension2->subsector->id,
                                                          ['class' => 'form-control',
                                                           'data-url' => url('load-occupations'),
                                                           'id' => 'subsector']) !!}
        </div>

        <div class="starter panel panel-default">
            <div class="panel-heading">
                STARTER <a data-toggle="collapse" href="#starter"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="starter" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('starter_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'starter_enterprise', null, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'starter_mse_operator_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'starter_mse_operator_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'starter_mse_operator_supported_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'starter_mse_operator_supported_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="starter panel panel-default"--}}

        <div class="advance panel panel-default">
            <div class="panel-heading">
                ADVANCE <a data-toggle="collapse" href="#advance"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="advance" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('advance_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'advance_enterprise', null, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'advance_mse_operator_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'advance_mse_operator_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'advance_mse_operator_supported_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'advance_mse_operator_supported_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="advance panel panel-default"--}}

        <div class="competent panel panel-default">
            <div class="panel-heading">
                COMPETENT <a data-toggle="collapse" href="#competent"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="competent" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('competent_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'competent_enterprise', null, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'competent_mse_operator_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'competent_mse_operator_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'competent_mse_operator_supported_male', null, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'competent_mse_operator_supported_female', null, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="competent panel panel-default"--}}

        <div class="form-group">
            {!! Form::label('remarks', 'Remarks : ') !!}
            {!! Form::textarea('remarks',null, ['class' => 'form-control']) !!}
        </div>

    </div> {{--div class="update-form"--}}

@elseif($submitButtonText=='Save')

    <div class="create-form">

        <div class="form-group">
            {!! Form::label('report_date_id', 'Report Schedule :') !!}
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

        <div class="starter panel panel-default">
            <div class="panel-heading">
                STARTER <a data-toggle="collapse" href="#starter"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="starter" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('starter_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'starter_enterprise', 0, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'starter_mse_operator_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'starter_mse_operator_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'starter_mse_operator_supported_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'starter_mse_operator_supported_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="starter panel panel-default"--}}

        <div class="advance panel panel-default">
            <div class="panel-heading">
                ADVANCE <a data-toggle="collapse" href="#advance"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="advance" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('advance_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'advance_enterprise', 0, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'advance_mse_operator_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'advance_mse_operator_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'advance_mse_operator_supported_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'advance_mse_operator_supported_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="advance panel panel-default"--}}

        <div class="competent panel panel-default">
            <div class="panel-heading">
                COMPETENT <a data-toggle="collapse" href="#competent"><span class="glyphicon glyphicon-collapse-down" aria-hidden="true"></span></a>
            </div>

            <div id="competent" class="panel-collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                {!! Form::label('competent_enterprise', 'Number of Enterprises :') !!}
                                {!! Form::input('number', 'competent_enterprise', 0, ['class' => 'form-control']) !!}
                            </div>

                        </div> {{--div class="col-md-10 col-md-offset-1"--}}


                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">MSE Operators</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'competent_mse_operator_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'competent_mse_operator_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="form-group">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Number of MSE operators supported by IE	</th>
                                        </tr>
                                        <tr>
                                            <th>Male</th>
                                            <th>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{!! Form::input('number', 'competent_mse_operator_supported_male', 0, ['class' => 'form-control']) !!}</td>
                                            <td>{!! Form::input('number', 'competent_mse_operator_supported_female', 0, ['class' => 'form-control']) !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> {{--div class="col-md-10 col-md-offset-1"--}}

                    </div> {{--div class="row"--}}
                </div>
            </div>
        </div> {{--div class="competent panel panel-default"--}}


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