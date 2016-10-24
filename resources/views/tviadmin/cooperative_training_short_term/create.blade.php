@extends('tviadmin ')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create entry for Cooperative Training on Short-term Trainees </h1></div>
                    <div class="panel-body">
                        {!! Form::open(['url'   => '/cooperative-training-short-term',
                                        'role'  => 'form',
                                        'class' => 'form-vertical'
                                       ]
                            ) !!}
                            {!! Form::hidden('institution_id', $institution_id) !!}
                            @include('tviadmin.cooperative_training_short_term.form', ['submitButtonText' => 'Save',
                                                                        'report_dates' => $report_dates])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection