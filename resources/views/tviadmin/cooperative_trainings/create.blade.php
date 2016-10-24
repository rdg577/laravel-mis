@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create entry for Cooperative Training with Partner Industries</h1></div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/cooperative-trainings',
                                        'role'  => 'form',
                                        'class' => 'form-horizontal'
                                       ]
                            ) !!}
                            {!! Form::hidden('institution_id', $institution_id) !!}
                            @include('tviadmin.cooperative_trainings.form', ['submitButtonText' => 'Save',
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