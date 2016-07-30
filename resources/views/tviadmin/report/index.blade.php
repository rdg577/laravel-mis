@extends('tviadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Report Data Summary :</div>
                <div class="panel-body">
                    {!! Form::open(['url'   => '/report-data-summary',
                                                'role'  => 'form',
                                                'class' => 'form-horizontal'
                                               ]
                                    ) !!}

                    {!! Form::hidden('institution_id', $institution_id) !!}

                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            {!! Form::label('report_date_id', 'Kindly Select a Report Schedule : ') !!}
                            {!! Form::select('report_date_id', $report_dates, null, ['placeholder' => '', 'class' => 'form-control']) !!}
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