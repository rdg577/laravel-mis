@extends('tviadmin ')

@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Save As Report</div>
                    <div class="panel-body">
                        <div class="row">
                            {!! Form::open(['url'   => '/industry-extension-5/save-as',
                                            'role'  => 'form',
                                            'class' => 'form-horizontal'
                                           ]
                                ) !!}

                            {!! Form::hidden('institution_id', $institution_id) !!}

                            <div class="col col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                <div class="form-group">
                                    {!! Form::label('report_date_id', 'Source Report Schedule : ') !!}
                                    {!! Form::text('report_date_petsa', $report_date->petsa, ['class' => 'form-control',
                                                                                              'readonly' => 'readonly']) !!}
                                    {!! Form::hidden('report_date_id_source', $report_date->id) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('report_date_id_target', 'Target Report Schedule :') !!}
                                    {!! Form::select('report_date_id_target', $report_dates, $report_date->id, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                                    {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection