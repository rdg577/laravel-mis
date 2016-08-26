@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit tracer study</div>
                    <div class="panel-body">
                        {!! Form::model($tracer_study,
                            [
                                'method' => 'PATCH',
                                'url'=>'/tracer-studies/' . $tracer_study->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.tracer_studies.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $tracer_study->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection