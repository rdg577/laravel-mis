@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit assessment on transferee</h1></div>
                    <div class="panel-body">
                        {!! Form::model($assessment_transferee,
                            [
                                'method' => 'PATCH',
                                'url'=>'/assessment-transferees/' . $assessment_transferee->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.assessment_transferees.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $assessment_transferee->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection