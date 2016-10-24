@extends('rtaadmin')

@section('content')
    <?php
        $reports = [
                0 => 'Non-Government -> New Enrollees',
                1 => 'Non-Government -> Re-Enrollees',
                2 => 'Non-Government -> Transferees',
                3 => 'Non-Government -> Graduates',
                4 => 'Non-Government -> Short Term',
                5 => 'Non-Government -> Dropouts [Transferees]',
                6 => 'Non-Government -> Dropouts [Graduates]',
                7 => 'Non-Government -> Dropouts [Short-Term Trainees]',
                8 => 'Non-Government -> Assessment [Transferees]',
                9 => 'Non-Government -> Assessment [Graduates]',
                10 => 'Non-Government -> Assessment [Short-Term Trainees]',
                11 => 'Non-Government -> Cooperative Training [With Partner Industries]',
                12 => 'Non-Government -> Cooperative Training [Transferees]',
                13 => 'Non-Government -> Cooperative Training [Graduates]',
                14 => 'Non-Government -> Cooperative Training [Short-Term Trainees]',
                15 => 'Non-Government -> Saving [Transferees]',
                16 => 'Non-Government -> Saving [Graduates]',
                17 => 'Non-Government -> Job Placement [Graduates]',
                18 => 'Non-Government -> Action Research',
                19 => 'Non-Government -> Tracer Study'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Generate Report 1 (Non-Governmental)</h1></div>
                    <div class="panel-body" style="background-color: #2cb0ff">
                        {!! Form::open(['url'   => '/report-1/non-government',
                        'role'  => 'form',
                        'class' => 'form-horizontal',
                        'target' => '_blank'
                        ]
                        ) !!}

                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                {!! Form::label('petsa', 'Kindly Select a Report Schedule to be based from : ') !!}
                                {!! Form::select('petsa', $report_dates, null, ['placeholder' => '', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('report', 'Type : ') !!}
                                {!! Form::select('report', $reports, null, ['placeholder' => '', 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection