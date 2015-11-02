@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create assessment entry</div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/assessments',
                                        'role'  => 'form',
                                        'class' => 'form-horizontal'
                                       ]
                            ) !!}
                            {!! Form::hidden('institution_id', $institution_id) !!}
                            @include('tviadmin.assessments.form', ['submitButtonText' => 'Save',
                                                                        'report_dates' => $report_dates,
                                                                        'report_date_id' => $report_date_id,
                                                                        'sectors' => $sectors])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection