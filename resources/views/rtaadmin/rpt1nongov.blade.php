@extends('rtaadmin')

@section('content')
    <?php
        $reports = ['Non-Government -> New Enrollees',
                    'Non-Government -> Re-Enrollees',
                    'Non-Government -> Transferees',
                    'Non-Government -> Graduates',
                    'Non-Government -> Short Term',
                    'Non-Government -> Dropouts [Transferees]',
                    'Non-Government -> Dropouts [Graduates]'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Generate Report 1 - Non-Governmental :</div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/report-1/non-government',
                        'role'  => 'form',
                        'class' => 'form-horizontal'
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