@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit assessment on short term trainees</h1></div>
                    <div class="panel-body">
                        {!! Form::model($assessment_shortterm,
                            [
                                'method' => 'PATCH',
                                'url'=>'/assessment-short-term/' . $assessment_shortterm->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.assessment_short_term.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $assessment_shortterm->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection