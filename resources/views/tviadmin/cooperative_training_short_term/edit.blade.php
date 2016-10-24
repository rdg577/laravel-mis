@extends('tviadmin')
@section('content')
    @include('errors.list')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Edit entry for Cooperative Training on Short term Trainees</h1></div>
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