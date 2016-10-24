@extends('rtaadmin')

@section('content')
    <?php
        $reports = [
                0 => 'Government -> New Enrollees',
                1 => 'Government -> Re-Enrollees',
                2 => 'Government -> Transferees',
                3 => 'Government -> Graduates',
                4 => 'Government -> Short Term',
                5 => 'Government -> Dropouts [Transferees]',
                6 => 'Government -> Dropouts [Graduates]',
                7 => 'Government -> Dropouts [Short-Term Trainees]',
                8 => 'Government -> Assessment [Transferees]',
                9 => 'Government -> Assessment [Graduates]',
               10 => 'Government -> Assessment [Short-Term Trainees]',
               11 => 'Government -> Cooperative Training [With Partner Industries]',
               12 => 'Government -> Cooperative Training [Transferees]',
               13 => 'Government -> Cooperative Training [Graduates]',
               14 => 'Government -> Cooperative Training [Short-Term Trainees]',
               15 => 'Government -> Saving [Transferees]',
               16 => 'Government -> Saving [Graduates]',
               17 => 'Government -> Job Placement [Graduates]',
               18 => 'Government -> Action Research',
               19 => 'Government -> Tracer Study',
               20 => 'Government -> Trainers',
               21 => 'Government -> Industry Extension 1',
               22 => 'Government -> Industry Extension 2',
               23 => 'Government -> Industry Extension 3',
               24 => 'Government -> Industry Extension 4',
               25 => 'Government -> Industry Extension 5'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Generate Report 1 (Governmental)</h1></div>
                    <div class="panel-body" style="background-color: #60ff88">
                        {!! Form::open(['url'   => '/report-1/government',
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