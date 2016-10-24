@extends('tviadmin')

@section('content')

    <div class="flash-message">
        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">
                    {{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>

    <?php
        $reports = [
                   0 => 'New Enrollees',
                   1 => 'Re-Enrollees',
                   2 => 'Transferees',
                   3 => 'Graduates',
                   4 => 'Short Term',
                   5 => 'Dropouts [Transferees]',
                   6 => 'Dropouts [Graduates]',
                   7 => 'Dropouts [Short-Term Trainees]',
                   8 => 'Assessment [Transferees]',
                   9 => 'Assessment [Graduates]',
                   10 => 'Assessment [Short-Term Trainees]',
                   19 => 'Cooperative Training [with Industry Partners]',
                   11 => 'Cooperative Training [Transferees]',
                   12 => 'Cooperative Training [Graduates]',
                   13 => 'Cooperative Training [Short-Term Trainees]',
                   14 => 'Saving [Transferees]',
                   15 => 'Saving [Graduates]',
                   16 => 'Job Placement [Graduates]',
                   17 => 'Action Research',
                   18 => 'Tracer Study'
                   ];
    ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ $institution->name }} Summary Report Setup</h1></div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => 'summary-report',
                        'role'  => 'form',
                        'class' => 'form-horizontal',
                        'target' => '_blank'
                        ]
                        ) !!}

                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                {!! Form::label('petsa', 'Select a Report Period : ') !!}
                                {!! Form::select('petsa', $report_dates, null, ['placeholder' => '', 'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('target_report', 'Target Report : ') !!}
                                {!! Form::select('target_report', $reports, null, ['placeholder' => '...select a target report', 'class' => 'form-control']) !!}
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
@endsection