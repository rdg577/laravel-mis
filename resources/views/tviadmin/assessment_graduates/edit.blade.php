@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit assessment on graduates</h1></div>
                    <div class="panel-body">
                        {!! Form::model($assessment_graduate,
                            [
                                'method' => 'PATCH',
                                'url'=>'/assessment-graduates/' . $assessment_graduate->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.assessment_graduates.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $assessment_graduate->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection