@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit cooperative training on short term trainees</div>
                    <div class="panel-body">
                        {!! Form::model($cooperative_training_shortterm,
                            [
                                'method' => 'PATCH',
                                'url'=>'/cooperative-training-short-term/' . $cooperative_training_shortterm->id,
                                'role'=>'form', 'class'=>'form-vertical'
                            ]
                            ) !!}
                            @include('tviadmin.cooperative_training_short_term.form', [
                                                                'submitButtonText' => 'Update',
                                                                'active' => $cooperative_training_shortterm->active
                                                              ])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection