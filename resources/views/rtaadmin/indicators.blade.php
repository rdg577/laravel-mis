@extends('rtaadmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Generate Regional Level Indicators :</div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/rta-indicators',
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