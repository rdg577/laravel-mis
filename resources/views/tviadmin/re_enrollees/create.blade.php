@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create re-enrollees entry</h1></div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/trainees-re-enrollees',
                                        'role'  => 'form',
                                        'class' => 'form-vertical'
                                       ]
                            ) !!}
                            {!! Form::hidden('institution_id', $institution_id) !!}
                            @include('tviadmin.re_enrollees.form', ['submitButtonText' => 'Save',
                                                                        'report_dates' => $report_dates])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection